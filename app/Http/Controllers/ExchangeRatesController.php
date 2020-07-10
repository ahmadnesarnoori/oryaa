<?php

namespace App\Http\Controllers;

use App\Exchangerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ExchangeRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $indexes  =   DB::table('exchangerates')
                    ->join('currencies', 'exchangerates.first_currency', '=', 'currencies.id')
                    ->select('exchangerates.id', 'exchangerates.first_currency', 'exchangerates.second_currency', 'currencies.currency', 'currencies.type', 'currencies.image', 'exchangerates.rate', 'exchangerates.value', 'exchangerates.updated_at')
                    ->get();


      return view('exchangerates.index', ['newsfeeds' => $indexes]);
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
     * @param  \App\Exchangerate  $exchangerate
     * @return \Illuminate\Http\Response
     */
    public function show(Exchangerate $exchangerate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exchangerate  $exchangerate
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchangerate $exchangerate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exchangerate  $exchangerate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchangerate $exchangerate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exchangerate  $exchangerate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchangerate $exchangerate)
    {
        //
    }
}
