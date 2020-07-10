<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Auth;
use Image;

class TransactionsController extends Controller
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
        $Transaction = new Transaction;

        $originalImage= $request->file('file');
        $imagename = Auth::user()->id.time().'.'.'jpg';

        $Transaction->user_id = Auth::user()->id;
        $Transaction->person_id = $request->person_id;
        $Transaction->debit = $request->debit;
        $Transaction->credit = $request->credit;
        $Transaction->currency = $request->currency;
        $Transaction->amount = $request->amount;
        $Transaction->description = $request->description;
        $Transaction->file = $imagename;

        $Transaction->save();

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
            ($Transaction->save())
        {
        return redirect()->back()->with('success', 'Credit transaction successfully processed');
        }
        else{
        return redirect()->back()->with('errors', 'Something went wrong please try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transactionsUpdate = Transaction::where('id', $transaction->id)
        ->update([
            'second_account' => $request->input('second_account')
        ]);

        return redirect()->back()->with('success', 'You have successfuly updated this transaction.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
