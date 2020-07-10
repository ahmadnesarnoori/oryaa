<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $userUpdate = User::where('id', Auth::user()->id)
      ->update([
          'file' => Auth::user()->id.'.'.'jpg'
      ]);

      $this->validate($request, [
        'file' => 'mimes:jpg,jpeg,png|max:1000'
      ]);

      $originalImage= $request->file('file');
      $thumbnailImage = Image::make($originalImage);
      $originalPath = public_path().'/storage/images/cover/';
      $thumbnailImage->resize(300, null, function ($constraint) {
          $constraint->aspectRatio();
      });
      $thumbnailImage->save($originalPath.Auth::user()->id.'.'.'jpg');

      return redirect()->back()->with('success', 'You have successfuly updated your cover picture.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
