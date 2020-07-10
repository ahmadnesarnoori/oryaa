<?php

namespace App\Http\Controllers;

use App\Journalentry;
use Illuminate\Http\Request;
use Auth;

class JournalEntriesController extends Controller
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
        $Journalentry = new Journalentry;

        $Journalentry->user_id = Auth::user()->id;
        $Journalentry->debit = $request->debit;
        $Journalentry->credit = $request->credit;
        $Journalentry->currency = $request->currency;
        $Journalentry->amount = $request->amount;
        $Journalentry->description = $request->description;

        $Journalentry->save();

        if
            ($Journalentry->save())
        {
        return redirect()->back()->with('success', 'Journal entry successfully processed');
        }
        else{
        return redirect()->back()->with('errors', 'Something went wrong please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Journalentry  $journalentry
     * @return \Illuminate\Http\Response
     */
    public function show(Journalentry $journalentry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Journalentry  $journalentry
     * @return \Illuminate\Http\Response
     */
    public function edit(Journalentry $journalentry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journalentry  $journalentry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journalentry $journalentry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journalentry  $journalentry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journalentry $journalentry)
    {
        //
    }
}
