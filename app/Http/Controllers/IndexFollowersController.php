<?php

namespace App\Http\Controllers;

use App\Indexfollower;
use Illuminate\Http\Request;
use Auth;

class IndexFollowersController extends Controller
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
      $indexfollower = new indexfollower;

      $indexfollower->user_id = Auth::user()->id;
      $indexfollower->index = $request->id;
      $indexfollower->save();

      return redirect()->back()->with('success', 'You have successfully added an index to your watch list');
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
    public function destroy($id)
    {
        $indexfollower = Indexfollower::findOrFail($id);
        $indexfollower->delete();

        return redirect()->back()->with('success', 'You have successfully deleted an index from your watch list.');
    }
}
