<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;
use Auth;
use Image;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposit1  =  DB::table('messages')
                      ->SelectRaw('id, user_id, person_id, created_at, message as description, "Send" as type, file')
                      ->Where('user_id', Auth::user()->id);

        $deposit2  =  DB::table('messages')
                      ->SelectRaw('id, person_id as user_id, user_id as person_id, created_at, message as description, "Received" as type, file')
                      ->where('person_id', Auth::user()->id);

        $quarie1   =  $deposit1->unionAll($deposit2);
        $quarie2   =  $quarie1->toSql();
        $newsfeeds =  DB::table(DB::raw("($quarie2) as aaa"))->mergeBindings($quarie1)
                      ->join('users', 'aaa.person_id','=','users.id')
                      ->Select('aaa.id', 'aaa.user_id', 'aaa.person_id', 'users.name', 'users.first_name', 'users.last_name','users.image',
                      'aaa.created_at', 'aaa.description', 'aaa.type', 'aaa.file')
                      ->latest()
                      ->paginate(10);


        return view('messages.index', ['newsfeeds' => $newsfeeds]);
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

        $Message = new Message;

        $originalImage= $request->file('file');
        $imagename = Auth::user()->id.time().'.'.'jpg';

        $Message->user_id = Auth::user()->id;
        $Message->person_id = $request->person_id;
        $Message->message = $request->message;
        $Message->file = $imagename;

        $Message->save();

        $this->validate($request, [
          'file' => 'mimes:jpg,jpeg,png|max:2000'
        ]);

        if($request->hasFile('file'))
        {
          $originalImage= $request->file('file');
          $thumbnailImage = Image::make($originalImage);
          $originalPath = public_path().'/storage/images/messages/';
          $thumbnailImage->resize(500, null, function ($constraint) {
              $constraint->aspectRatio();
          });
          $thumbnailImage->save($originalPath.$imagename);
        }

        if
            ($Message->save())
        {
        return redirect()->back()->with('success', 'Message successfuly Sent');
        }
        else{
        return redirect()->back()->with('errors', 'Something went wrong please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
