<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Auth;
use Image;

class PaymentsController extends Controller
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => 'required|numeric',
            'person_id' => 'required|numeric',
            'account' => 'required|numeric',
            'currency' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function store(Request $request)
    {
        $Payment = new Payment;

        $originalImage= $request->file('file');
        $imagename = Auth::user()->id.time().'.'.'jpg';

        $Payment->user_id = Auth::user()->id;
        $Payment->person_id = $request->person_id;
        $Payment->account = $request->account;
        $Payment->currency = $request->currency;
        $Payment->amount = $request->amount;
        $Payment->description = $request->description;
        $Payment->file = $imagename;

        $Payment->save();

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
            ($Payment->save())
        {
        return redirect()->back()->with('success', 'You have successfully transferred money.');
        }
        else{
        return redirect()->back()->with('errors', 'Something went wrong please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $paymentUpdate = Payment::where('id', $payment->id)
        ->update([
            'second_account' => $request->input('second_account')
        ]);

        return redirect()->back()->with('success', 'You have successfuly updated this transaction.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
