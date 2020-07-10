<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CashSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payment1  =  DB::table('payments')
                      ->leftjoin('accounts', 'payments.second_account', '=', 'accounts.id')
                      ->SelectRaw('payments.id, payments.person_id as user_id, payments.user_id as person_id, payments.created_at, payments.description, payments.account, payments.amount, payments.currency, "paid" as type, payments.file, payments.second_account said, accounts.account as saac, "payments" as link ')
                      ->where('payments.person_id', Auth::user()->id)
                      ->whereNotBetween('payments.account', [20000, 59999]);

        $quarie1   =  $payment1->toSql();
        $newsfeeds =  DB::table(DB::raw("($quarie1) as aaa"))->mergeBindings($payment1)
                      ->leftjoin('currencies', 'aaa.currency', '=', 'currencies.id')
                      ->join('users', 'aaa.person_id','=','users.id')
                      ->leftjoin('accounts', 'aaa.account','=','accounts.id')
                      ->Select('aaa.id', 'aaa.user_id', 'aaa.person_id', 'users.name', 'users.first_name', 'users.last_name','users.image',
                      'aaa.created_at', 'aaa.description', 'aaa.account as account_number','accounts.account','aaa.amount','aaa.currency as currency_id', 'currencies.currency', 'aaa.type', 'aaa.file', 'aaa.said', 'aaa.saac', 'aaa.link')
                      ->latest()
                      ->paginate(10);

        $saccount = DB::table('accounts')
                      ->select('id', 'account')
                      ->whereNotBetween('id', [20000, 89999])
                      ->get();

        return view('sales.index', ['newsfeeds' => $newsfeeds, 'saccount' => $saccount]);
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
