<?php

namespace App\Http\Controllers;

use App\Indexfollower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class WatchListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $indexes  =   DB::table('indexfollowers')
                    ->join('indexes', 'indexfollowers.index', '=', 'indexes.id')
                    ->selectRaw('indexfollowers.id as ifid, indexfollowers.user_id, indexes.id, indexes.name, indexes.value, indexes.percentage, indexes.status, indexes.description, indexes.created_at, indexes.updated_at')
                    ->where('indexfollowers.user_id', Auth::user()->id)
                    ->latest()
                    ->get();

      return view('watchlist.index', ['newsfeed' => $indexes]);
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
     * @param  \App\Indexfollower  $indexfollower
     * @return \Illuminate\Http\Response
     */
    public function show(Indexfollower $indexfollower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indexfollower  $indexfollower
     * @return \Illuminate\Http\Response
     */
    public function edit(Indexfollower $indexfollower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indexfollower  $indexfollower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indexfollower $indexfollower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indexfollower  $indexfollower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indexfollower $indexfollower)
    {
        //
    }
}
