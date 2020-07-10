<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeComposer
{
	public function compose(View $view)
	{

        $deposit3 =   DB::table('deposits')
                      ->SelectRaw('currency, sum(amount) as balance')
                      ->where('user_id', Auth::user()->id)
                      ->groupBy('currency');

        $payment3 =   DB::table('payments')
                      ->SelectRaw('currency, sum(amount)*(-1) as balance')
                      ->where('user_id', Auth::user()->id)
                      ->groupBy('currency');

        $payment4 =   DB::table('payments')
                      ->SelectRaw('currency, sum(amount) as balance')
                      ->where('person_id', Auth::user()->id)
                      ->groupBy('currency');

        $exchange1=   DB::table('exchanges')
                      ->selectRaw('from_currency as currency, sum(from_amount)*(-1) as balance')
                      ->where('user_id', Auth::user()->id)
                      ->groupBy('from_currency');

        $exchange2=   DB::table('exchanges')
                      ->selectRaw('to_currency as currency, sum(to_amount) as balance')
                      ->where('user_id', Auth::user()->id)
                      ->groupBy('to_currency');

        $exchange3=   DB::table('exchanges')
                      ->selectRaw('to_currency as currency, sum(to_amount)*(-1) as balance')
                      ->where('person_id', Auth::user()->id)
                      ->groupBy('to_currency');

        $exchange4=   DB::table('exchanges')
                      ->selectRaw('from_currency as currency, sum(from_amount) as balance')
                      ->where('person_id', Auth::user()->id)
                      ->groupBy('from_currency');


        $quarie4  =   $payment4->unionAll($payment3)->unionAll($deposit3)->unionAll($exchange1)->unionAll($exchange2)->unionAll($exchange3)->unionAll($exchange4);
        $quarie5  =   $quarie4->toSql();
        $balance  =   DB::table(DB::raw("($quarie5) as bbb"))->mergeBindings($quarie4)
                      ->join('currencies', 'bbb.currency', '=', 'currencies.id')
                      ->join('exchangerates', 'bbb.currency', '=', 'exchangerates.first_currency')
                      ->selectRaw('bbb.currency as id, currencies.currency, sum(bbb.balance) as balance, exchangerates.rate, exchangerates.value')
                      ->groupBy('bbb.currency', 'currencies.currency', 'exchangerates.rate', 'exchangerates.value')
                      ->get();

        $view->with('balance', $balance);

        $followers=   DB::table('followers')
                      ->selectRaw('count(distinct(user_id)) as followers')
                      ->where('person_id', Auth::user()->id)
                      ->get();

        $view->with('followers', $followers);

        $following=   DB::table('followers')
                      ->selectRaw('count(distinct(person_id)) as following')
                      ->where('user_id', Auth::user()->id)
                      ->get();

        $view->with('following', $following);

        $posts    =   DB::table('posts')
                      ->selectRaw('count(user_id) as posts')
                      ->where('user_id', Auth::user()->id)
                      ->get();

        $view->with('posts', $posts);

        $index    =   DB::table('indexfollowers')
                      ->join('indexes', 'indexfollowers.index','=','indexes.id')
                      ->Select('indexfollowers.id as tid, indexfollowers.user_id','indexes.id', 'indexes.name','indexes.value','indexes.percentage','indexes.status')
                      ->where('indexfollowers.user_id', Auth::user()->id)->get();
        $view->with('index', $index);

        $messages =   DB::table('messages')
                      ->join('users', 'messages.user_id', '=', 'users.id')
                      ->selectRaw('messages.id, messages.created_at, substr(messages.message, 1, 40) as message, messages.user_id, users.name, users.first_name, users.last_name, users.image')
                      ->where('messages.person_id', Auth::user()->id)
                      ->latest()
                      ->limit(10)
                      ->get();
        $view->with('messages', $messages);


        $notification=DB::table('followers')
                      ->join('users', 'followers.user_id', '=', 'users.id')
                      ->select('followers.id','followers.person_id','users.first_name', 'users.last_name', 'users.image', 'followers.type', 'followers.created_at')
                      ->where('followers.person_id', Auth::user()->id)
                      ->latest()
                      ->limit(10)
                      ->get();

        $view->with('notification', $notification);

        $hashtag  = DB::table('posts')
                    ->SelectRaw('type, heading, count(heading) as count')
                    ->where('type', 'Hashtag')
                    ->groupBy('type', 'heading')
                    ->limit(10)
                    ->get();

	      $view->with('hashtag', $hashtag);


        $currency = DB::table('currencies')->get();
        $view->with('currency', $currency);


        $account  = DB::table('accounts')
                    ->where('id', '>=',10000 )
                    ->get();
        $view->with('account', $account);


        $aande    = DB::table('accounts')
                    ->whereNotBetween('id', [20000, 50000] )
                    ->where('id', '<', 90000)
                    ->where('id', '>=', 10000)
                    ->get();
        $view->with('aande', $aande);

        $loan     = DB::table('accounts')
                    ->whereBetween('id', [20000, 30000])
                    ->get();
        $view->with('loan', $loan);
  }
}
