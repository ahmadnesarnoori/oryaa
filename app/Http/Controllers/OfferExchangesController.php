<?php

namespace App\Http\Controllers;

use App\Offerexchange;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Auth;

class OfferExchangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $one      =   DB::table('offerexchanges')
                      ->join('users', 'offerexchanges.user_id', '=', 'users.id')
                      ->join('currencies', 'offerexchanges.from_currency', '=', 'currencies.id')
                      ->select('offerexchanges.id','offerexchanges.user_id','users.first_name', 'users.last_name','users.image', 'offerexchanges.from_currency','currencies.currency', 'offerexchanges.from_amount',
                      'offerexchanges.to_currency','offerexchanges.to_amount','offerexchanges.created_at')
                      ->where('offerexchanges.status', 0);

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
        $Offerexchange = new Offerexchange;

        $Offerexchange->user_id = Auth::user()->id;
        $Offerexchange->from_currency = $request->from_currency;
        $Offerexchange->from_amount = $request->from_amount;
        $Offerexchange->to_currency = $request->to_currency;
        $Offerexchange->to_amount = $request->to_amount;

        $Offerexchange->save();

        if
            ($Offerexchange->save())
        {
        return redirect()->back()->with('success', 'Exchange offer successfully placed');
        }
        else{
        return redirect()->back()->with('errors', 'Something went wrong please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offerexchange  $offerexchange
     * @return \Illuminate\Http\Response
     */
    public function show(Offerexchange $offerexchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offerexchange  $offerexchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Offerexchange $offerexchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offerexchange  $offerexchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offerexchange $offerexchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offerexchange  $offerexchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offerexchange $offerexchange)
    {
        //
    }
}
