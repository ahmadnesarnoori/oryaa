<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Follower;
use Auth;

class FollowersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $quarie3  =   DB::table('followers')
                    ->join('users', 'followers.user_id', 'users.id')
                    ->select('followers.id', 'followers.created_at','followers.type', 'followers.user_id as person_id', 'users.name', 'users.first_name', 'users.last_name', 'users.image', 'users.file', 'users.country', 'users.phone_number', 'users.status')
                    ->where('followers.person_id', Auth::user()->id)
                    ->latest()
                    ->paginate(20);

      return view('followers.index', ['newsfeeds' => $quarie3]);
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
        $Followers = new Follower;

        $Followers->user_id = Auth::user()->id;
        $Followers->person_id = $request->person_id;
        $Followers->type = $request->type;

        $Followers->save();

        if
            ($Followers->save())
        {
        return redirect()->back()->with('success', 'You have successfuly followed this account');
        }
        else{
        return redirect()->back()->with('errors', 'Something went wrong please try again later');
        }
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
        $follower = Follower::findOrFail($id);
        $follower->delete();

        return redirect()->back()->with('success', 'You have successfuly unfollowed a user.');
    }
}
