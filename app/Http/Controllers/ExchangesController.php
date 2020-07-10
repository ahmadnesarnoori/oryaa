<?php

namespace App\Http\Controllers;

use App\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ExchangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $one      =   DB::table('exchanges')
                      ->join('users', 'exchanges.user_id', '=', 'users.id')
                      ->join('currencies', 'exchanges.from_currency', '=', 'currencies.id')
                      ->select('exchanges.id','exchanges.user_id','users.first_name', 'users.last_name','users.image', 'exchanges.from_currency','currencies.currency', 'exchanges.from_amount',
                      'exchanges.to_currency','exchanges.to_amount','exchanges.created_at');

        $two      =   $one->toSql();
        $exchange =   DB::table(DB::raw("($two) as ccc"))->mergeBindings($one)
                      ->join('currencies', 'ccc.to_currency', '=', 'currencies.id')
                      ->select('ccc.id','ccc.user_id', 'ccc.first_name', 'ccc.last_name','ccc.image', 'ccc.from_currency', 'ccc.currency as firstcurrency', 'ccc.from_amount', 'ccc.to_currency', 'currencies.currency as secondcurrency', 'ccc.to_amount', 'ccc.created_at')
                      ->latest()
                      ->paginate(10);


        return view('exchange.index', ['newsfeeds' => $exchange]);
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
        $Exchange = new Exchange;

        $Exchange->user_id = Auth::user()->id;
        $Exchange->from_currency = $request->from_currency;
        $Exchange->from_amount = $request->from_amount;
        $Exchange->to_currency = $request->to_currency;
        $Exchange->to_amount = $request->to_amount;

        $Exchange->save();

        if
            ($Exchange->save())
        {
        return redirect()->back()->with('success', 'Excahgne offer successfuly placed');
        }
        else{
        return redirect()->back()->with('errors', 'Something went wrong please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function show(Exchange $exchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        //
    }
}
