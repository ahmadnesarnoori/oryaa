<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\information;
use App\User;
use Auth;

class UserMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($person_id)
    {
        $deposit1  =  DB::table('messages')
                      ->SelectRaw('id, user_id, person_id, created_at, message as description, file')
                      ->Where('user_id', Auth::user()->id)
                      ->where('person_id', $person_id);

        $deposit2  =  DB::table('messages')
                      ->SelectRaw('id, user_id, person_id, created_at, message as description, file')
                      ->where('person_id', Auth::user()->id)
                      ->where('user_id', $person_id);

        $quarie1   =  $deposit1->unionAll($deposit2);
        $quarie2   =  $quarie1->toSql();
        $newsfeeds =  DB::table(DB::raw("($quarie2) as aaa"))->mergeBindings($quarie1)
                      ->join('users', 'aaa.user_id','=','users.id')
                      ->Select('aaa.id', 'aaa.user_id', 'aaa.person_id', 'users.name', 'users.first_name', 'users.last_name','users.image',
                      'aaa.created_at', 'aaa.description', 'aaa.file')
                      ->latest()
                      ->paginate(10);


      $info     =   information::where('user_id', $person_id)->get();

      $balance1 =   DB::table('deposits')
                    ->SelectRaw('currency, account, sum(amount) as balance')
                    ->where('user_id', Auth::user()->id)->where('bank_id', $person_id)
                    ->groupBy('currency', 'account');

      $balance2 =   DB::table('payments')
                    ->selectRaw('currency, account, sum(amount) as balance')
                    ->where('user_id', Auth::user()->id)->where('person_id', $person_id)
                    ->whereBetween('account', [20000, 39999])
                    ->groupBy('currency', 'account');

      $balance3 =   DB::table('payments')
                    ->selectRaw('currency, account, sum(amount)*(-1) as balance')
                    ->where('person_id', Auth::user()->id)->where('user_id', $person_id)
                    ->whereBetween('account', [20000, 39999])
                    ->groupBy('currency', 'account');

      $balance4 =   DB::table('transactions')
                    ->selectRaw('currency, credit as account, sum(amount)*(-1) as balance')
                    ->where('user_id', Auth::user()->id)->where('person_id', $person_id)
                    ->whereBetween('credit', [20000, 39999])
                    ->groupBy('currency', 'credit');

      $balance5 =   DB::table('transactions')
                    ->selectRaw('currency, credit as account, sum(amount) as balance')
                    ->where('person_id', Auth::user()->id)->where('user_id', $person_id)
                    ->whereBetween('credit', [20000, 39999])
                    ->groupBy('currency', 'credit');

      $balance6 =   $balance1->unionAll($balance2)->unionAll($balance3)->unionAll($balance4)->unionAll($balance5);

      $balance7 =   $balance6->toSql();

      $balance8 =   DB::table(DB::raw("($balance7) as bbb"))->mergeBindings($balance6)
                    ->join('accounts', 'bbb.account', '=', 'accounts.id')
                    ->join('currencies', 'bbb.currency', '=', 'currencies.id')
                    ->selectRaw('bbb.currency as id, currencies.currency, currencies.image, concat(bbb.account, " . ", accounts.account) as rate, sum(balance) as balance, null as status, null as value')
                    ->groupBy('bbb.currency','currencies.currency', 'currencies.image', 'bbb.account', 'accounts.account', 'status', 'value')
                    ->get();


      $users    =   User::where('id', $person_id)->get();

      $following=   DB::table('followers')
                    ->selectRaw('count(distinct(person_id)) as following')
                    ->where('user_id', $person_id)
                    ->get();

      $followers=   DB::table('followers')
                    ->selectRaw('count(distinct(user_id)) as followers')
                    ->where('person_id', $person_id)
                    ->get();

      $posts    =   DB::table('posts')
                    ->selectRaw('count(user_id) as posts')
                    ->where('user_id', $person_id)
                    ->get();

      return view('users.usermessages', ['newsfeeds' => $newsfeeds, 'info' => $info,  'balance' =>
        $balance8, 'users' => $users, 'following' => $following, 'followers' => $followers, 'posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
