<?php

namespace App\Http\Controllers;

use App\Acceptexchange;
use Illuminate\Http\Request;
use Auth;

class AcceptExchangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $Acceptexchange = new Acceptexchange;

        $Acceptexchange->id = $request->id;
        $Acceptexchange->user_id = Auth::user()->id;

        $Acceptexchange->save();

        if
            ($Acceptexchange->save())
        {
        return redirect()->back()->with('success', 'Exchange offer successfully accepted');
        }
        else{
        return redirect()->back()->with('errors', 'Something went wrong please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acceptexchange  $acceptexchange
     * @return \Illuminate\Http\Response
     */
    public function show(Acceptexchange $acceptexchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acceptexchange  $acceptexchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Acceptexchange $acceptexchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acceptexchange  $acceptexchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acceptexchange $acceptexchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acceptexchange  $acceptexchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acceptexchange $acceptexchange)
    {
        //
    }
}
