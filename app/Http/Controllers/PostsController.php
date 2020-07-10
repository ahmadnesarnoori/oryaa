<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\Post;
use Auth;
use Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post      =  DB::table('posts')
                      ->SelectRaw('id, user_id, user_id as person_id, created_at, content as description, heading as account, type as amount, null as currency, "Post" as type, posts.file')
                      ->where('user_id', Auth::user()->id);


        $quarie2   =  $post->toSql();
        $newsfeeds =  DB::table(DB::raw("($quarie2) as aaa"))->mergeBindings($post)
                      ->leftjoin('currencies', 'aaa.currency', '=', 'currencies.id')
                      ->join('users', 'aaa.person_id','=','users.id')
                      ->leftjoin('accounts', 'aaa.account','=','accounts.id')
                      ->Select('aaa.id', 'aaa.user_id', 'aaa.person_id', 'users.name', 'users.first_name', 'users.last_name','users.image',
                      'aaa.created_at', 'aaa.description', 'aaa.account as account_number','accounts.account','aaa.amount','aaa.currency as currency_id', 'currencies.currency', 'aaa.type', 'aaa.file')
                      ->latest()
                      ->paginate(10);

        return view('home', ['newsfeeds' => $newsfeeds]);
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

        $originalImage= $request->file('file');
        $imagename = Auth::user()->id.time().'.'.'jpg';

        $Post = new Post;
        $Post->user_id = Auth::user()->id;
        $Post->type = $request->type;
        $Post->heading = $request->heading;
        $Post->content = $request->content;
        $Post->file =  $imagename;

        $Post->save();

        $this->validate($request, [
          'file' => 'mimes:jpg,jpeg,png|max:2000'
        ]);

        if($request->hasFile('file'))
        {
          $originalImage= $request->file('file');
          $thumbnailImage = Image::make($originalImage);
          $originalPath = public_path().'/storage/images/posts/';
          $thumbnailImage->resize(500, null, function ($constraint) {
              $constraint->aspectRatio();
          });
          $thumbnailImage->save($originalPath.$imagename);
        }

        if
            ($Post->save())
        {
            return redirect()->back()->with('success', 'You have successfully created a post');
        }
        else{
            return redirect()->back()->with('errors', 'Something went wrong please try again letter.');
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
        //
    }
}
