<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Deposit;
use App\Payment;
use App\Transaction;
use App\Exchange;
use App\Post;
use App\Indexfollower;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $deposit1  =  DB::table('deposits')
                      ->SelectRaw('id, user_id, bank_id as person_id, created_at, description, account, amount, currency, "Deposit" as type, file')
                      ->Where('user_id', Auth::user()->id);

        $deposit2  =  DB::table('deposits')
                      ->SelectRaw('id, bank_id as user_id, user_id as person_id, created_at, description, account, amount, currency, "Received" as type, file')
                      ->where('bank_id', Auth::user()->id);

        $payment1  =  DB::table('payments')
                      ->SelectRaw('id, user_id, person_id, created_at, description, account, amount, currency, "received" as type, file')
                      ->where('user_id', Auth::user()->id);

        $payment2  =  DB::table('payments')
                      ->SelectRaw('id, person_id as user_id, user_id as person_id, created_at, description, second_account as account, amount, currency, "paid" as type, file')
                      ->where('person_id', Auth::user()->id);

        $trans1    =  DB::table('transactions')
                      ->join('accounts', 'transactions.credit', '=', 'accounts.id')
                      ->SelectRaw('transactions.id, transactions.user_id, transactions.person_id, transactions.created_at, transactions.description, transactions.debit as account, transactions.amount, transactions.currency, concat( "sold on a ", accounts.account) as type, transactions.file')
                      ->where('user_id', Auth::user()->id);

        $trans2    =  DB::table('transactions')
                      ->join('accounts', 'transactions.credit', '=', 'accounts.id')
                      ->SelectRaw('transactions.id, transactions.person_id as user_id, transactions.user_id as person_id, transactions.created_at, transactions.description, transactions.second_account as account, transactions.amount, transactions.currency, concat("bought on a ", accounts.account) as type, transactions.file')
                      ->where('person_id', Auth::user()->id);

        $post1     =  DB::table('followers')
                      ->join('posts', 'followers.person_id', '=', 'posts.user_id')
                      ->SelectRaw('posts.id, followers.user_id, posts.user_id as person_id, posts.created_at, posts.content as description, posts.heading as account, posts.type as amount, null as currency, "Post" as type, posts.file')
                      ->where('followers.user_id', Auth::user()->id);

        $post2     =  DB::table('posts')
                      ->SelectRaw('id, user_id, user_id as person_id, created_at, content as description, heading as account, type as amount, null as currency, "Post" as type, posts.file')
                      ->where('user_id', Auth::user()->id);

        $post3     =  DB::table('posts')
                      ->SelectRaw('id, user_id, user_id as person_id, created_at, content as description, heading as account, type as amount, null as currency, "Post" as type, posts.file')
                      ->where('user_id', 1);

        $exchangeA =  DB::table('exchanges')
                      ->join('currencies', 'exchanges.from_currency', '=', 'currencies.id')
                      ->selectRaw('exchanges.id, exchanges.user_id, exchanges.person_id, exchanges.created_at, null as description, concat("With ", exchanges.from_amount," ", currencies.currency, " (",currencies.description, ")") as account, exchanges.to_amount as amount, exchanges.to_currency as currency, "Exchange" as type, "null" as file')
                      ->where('exchanges.user_id', Auth::user()->id);

        $exchangeB =  DB::table('exchanges')
                      ->join('currencies', 'exchanges.to_currency', '=', 'currencies.id')
                      ->selectRaw('exchanges.id, exchanges.person_id as user_id, exchanges.user_id as person_id, exchanges.created_at, null as description, concat("with ", exchanges.to_amount," ", currencies.currency, " (", currencies.description, ")") as account, exchanges.from_amount as amount, exchanges.from_currency as currency, "Exchange" as type, "null" as file')
                      ->where('exchanges.person_id', Auth::user()->id);

        $quarie1   =  $deposit1->unionAll($deposit2)->unionAll($payment1)->unionAll($payment2)->unionAll($trans1)->unionAll($trans2)->unionAll($post1)->unionAll($post2)->unionAll($post3)->unionAll($exchangeA)->unionAll($exchangeB);
        $quarie2   =  $quarie1->toSql();
        $newsfeeds =  DB::table(DB::raw("($quarie2) as aaa"))->mergeBindings($quarie1)
                      ->leftjoin('currencies', 'aaa.currency', '=', 'currencies.id')
                      ->join('users', 'aaa.person_id','=','users.id')
                      ->leftjoin('accounts', 'aaa.account','=','accounts.id')
                      ->select('aaa.id', 'aaa.user_id', 'aaa.person_id', 'users.name', 'users.first_name', 'users.last_name', 'users.image',
                      'aaa.created_at', 'aaa.description', 'aaa.account as account_number', 'accounts.account', 'aaa.amount', 'aaa.currency as currency_id', 'currencies.currency', 'aaa.type', 'aaa.file')
                      ->latest()
                      ->paginate(10);


        return view('home', ['newsfeeds' => $newsfeeds]);
    }
}
