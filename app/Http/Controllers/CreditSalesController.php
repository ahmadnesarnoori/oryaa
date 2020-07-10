<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CreditSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $trans1    =  DB::table('transactions')
                      ->leftjoin('accounts', 'transactions.second_account', '=', 'accounts.id')
                      ->SelectRaw('transactions.id, transactions.person_id as user_id, transactions.user_id as person_id, transactions.created_at, transactions.description, transactions.credit as account,
                        transactions.amount, transactions.currency, "null" as type, transactions.file, transactions.second_account as said, accounts.account as saac, "transactions" as link')
                      ->where('transactions.person_id', Auth::user()->id);

        $quarie1   =  $trans1->toSql();
        $newsfeeds =  DB::table(DB::raw("($quarie1) as aaa"))->mergeBindings($trans1)
                      ->leftjoin('currencies', 'aaa.currency', '=', 'currencies.id')
                      ->join('users', 'aaa.person_id','=','users.id')
                      ->leftjoin('accounts', 'aaa.account','=','accounts.id')
                      ->Select('aaa.id', 'aaa.user_id', 'aaa.person_id', 'users.name', 'users.first_name', 'users.last_name','users.image',
                      'aaa.created_at', 'aaa.description', 'aaa.account as account_number','accounts.account','aaa.amount','aaa.currency as currency_id', 'currencies.currency', 'aaa.type', 'aaa.file', 'aaa.said', 'aaa.saac', 'aaa.link')
                      ->latest()
                      ->paginate(10);

        $index    =   DB::table('indexfollowers')
                      ->join('indexes', 'indexfollowers.index','=','indexes.id')
                      ->Select('indexfollowers.user_id','indexes.id', 'indexes.name','indexes.value','indexes.percentage','indexes.status')
                      ->where('indexfollowers.user_id', Auth::user()->id)->get();

        $hashtag  =   DB::table('posts')
                      ->SelectRaw('type, heading, count(heading) as count')
                      ->where('type', 'Hashtag')
                      ->groupBy('type', 'heading')
                      ->get();

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
                      ->where('user_id', Auth::user()->id)->whereNotNull('person_id')
                      ->groupBy('from_currency');

        $exchange2=   DB::table('exchanges')
                      ->selectRaw('to_currency as currency, sum(to_amount) as balance')
                      ->where('user_id', Auth::user()->id)->whereNotNull('person_id')
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
                      ->selectRaw('bbb.currency as id, currencies.currency, sum(bbb.balance) as balance, sum(bbb.balance)*exchangerates.rate as home_balance, exchangerates.rate, exchangerates.value')
                      ->where('exchangerates.second_currency', Auth::user()->home_currency)
                      ->groupBy('bbb.currency', 'currencies.currency', 'exchangerates.rate', 'exchangerates.value')
                      ->get();

        $messages =   DB::table('messages')
                      ->join('users', 'messages.user_id', '=', 'users.id')
                      ->selectRaw('messages.id, messages.created_at, substr(messages.message, 1, 40) as message, messages.user_id, users.name, users.first_name, users.last_name, users.image')
                      ->where('messages.person_id', Auth::user()->id)
                      ->latest()
                      ->limit(10)
                      ->get();

        $following=   DB::table('followers')
                      ->selectRaw('count(distinct(person_id)) as following')
                      ->where('user_id', Auth::user()->id)
                      ->get();

        $followers=   DB::table('followers')
                      ->selectRaw('count(distinct(user_id)) as followers')
                      ->where('person_id', Auth::user()->id)
                      ->get();

        return view('sales.index', ['newsfeeds' => $newsfeeds, 'index' => $index, 'hashtag' => $hashtag, 'deposit3' => $deposit3, 'balance' => $balance, 'messages' => $messages, 'following' => $following, 'followers' => $followers]);
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
