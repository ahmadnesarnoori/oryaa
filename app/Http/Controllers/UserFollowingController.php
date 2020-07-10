<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Information;
use App\User;
use Auth;

class UserFollowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($person_id)
    {
      $quarie3  =   DB::table('followers')
                    ->join('users', 'followers.person_id', 'users.id')
                    ->select('followers.id', 'followers.created_at','followers.type', 'followers.person_id', 'users.name', 'users.first_name', 'users.last_name', 'users.image', 'users.file', 'users.country', 'users.phone_number', 'users.status' )
                    ->where('followers.user_id', $person_id)
                    ->latest()
                    ->paginate(20);

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


      return view('users.userfollowers', ['newsfeeds' => $quarie3, 'info' => $info,  'balance' =>
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
