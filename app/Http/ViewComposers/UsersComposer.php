<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Auth;

class UsersComposer
{
	public function compose(View $view)
	{

        $currency = DB::table('currencies')->get();
        $view->with('currency', $currency);


        $account  = DB::table('accounts')
                    ->where('id', '>=',10000 )
                    ->get();
        $view->with('account', $account);


        $aande    = DB::table('accounts')
                    ->whereNotBetween('id', [30000, 50000] )
                    ->where('id', '<', 90000)
                    ->where('id', '>=', 10000)
                    ->get();
        $view->with('aande', $aande);

        $loan     = DB::table('accounts')
                    ->whereBetween('id', [20000, 30000])
                    ->get();
        $view->with('loan', $loan);

        $messages = DB::table('messages')
                    ->join('users', 'messages.user_id', '=', 'users.id')
                    ->selectRaw('substr(messages.message, 1, 40) as message, messages.user_id, users.name, users.first_name, users.last_name, users.image')
                    ->where('messages.person_id', Auth::user()->id)
                    ->get();
        $view->with('messages', $messages);

        $index    = DB::table('indexfollowers')
                    ->join('indexes', 'indexfollowers.index','=','indexes.id')
                    ->Select('indexfollowers.user_id','indexes.id', 'indexes.name','indexes.value','indexes.percentage','indexes.status')
                    ->where('indexfollowers.user_id', Auth::user()->id)->get();

        $view->with('index', $index);
  }
}