<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Jenssegers\Agent\Agent;
use App\Deposit;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                      ->selectRaw('bbb.currency as id, currencies.currency, sum(bbb.balance) as balance, exchangerates.rate, exchangerates.value')
                      ->groupBy('bbb.currency', 'currencies.currency', 'exchangerates.rate', 'exchangerates.value')
                      ->get();

        return $balance;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
