<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\information;
use Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payment1  =  DB::table('payments')
                      ->SelectRaw('id, user_id, person_id, created_at, description, account, amount, currency, "Received" as type, file')
                      ->where('user_id', Auth::user()->id);

        $trans1    =  DB::table('transactions')
                      ->SelectRaw('id, user_id, person_id, created_at, description, credit as account, amount, currency, "null" as type, file')
                      ->where('user_id', Auth::user()->id);

        $post      =  DB::table('posts')
                      ->SelectRaw('id, user_id as user_id, user_id as person_id, created_at, content as description, heading as account, type as amount, null as currency, "Post" as type, file')
                      ->where('user_id', Auth::user()->id);

        $exchangeA =  DB::table('exchanges')
                      ->join('currencies', 'exchanges.from_currency', '=', 'currencies.id')
                      ->selectRaw('exchanges.id, exchanges.user_id, exchanges.person_id, exchanges.created_at, null as description, concat("With ", exchanges.from_amount," ", currencies.currency, " (",currencies.description, ")") as account, exchanges.to_amount as amount, exchanges.to_currency as currency, "Exchange" as type, "null" as file')
                      ->whereNotNull('person_id')
                      ->where('exchanges.user_id', Auth::user()->id);

        $quarie1   =  $payment1->unionAll($trans1)->unionAll($post)->unionAll($exchangeA);
        $quarie2   =  $quarie1->toSql();
        $newsfeeds =  DB::table(DB::raw("($quarie2) as aaa"))->mergeBindings($quarie1)
                      ->leftjoin('currencies', 'aaa.currency', '=', 'currencies.id')
                      ->join('users', 'aaa.person_id','=','users.id')
                      ->leftjoin('accounts', 'aaa.account','=','accounts.id')
                      ->Select('aaa.id', 'aaa.user_id', 'aaa.person_id', 'users.name', 'users.first_name', 'users.last_name','users.image',
                      'aaa.created_at', 'aaa.description', 'aaa.account as account_number','accounts.account','aaa.amount','aaa.currency as currency_id', 'currencies.currency', 'aaa.type', 'aaa.file')
                      ->latest()
                      ->paginate(10);

        $info     =   information::where('user_id', Auth::user()->id)->get();


        return view('profile.index', ['newsfeeds' => $newsfeeds, 'info' => $info]);
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
