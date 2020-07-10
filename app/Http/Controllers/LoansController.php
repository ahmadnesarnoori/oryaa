<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\information;
use Auth;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $balance1 =   DB::table('deposits')
                    ->SelectRaw('bank_id as user_id, currency, sum(amount) as balance')
                    ->where('user_id', Auth::user()->id)
                    ->groupBy('currency', 'bank_id');

      $balance2 =   DB::table('payments')
                    ->selectRaw('person_id as user_id, currency, sum(amount) as balance')
                    ->where('user_id', Auth::user()->id)
                    ->whereBetween('account', [20000, 39999])
                    ->groupBy('currency', 'person_id');

      $balance3 =   DB::table('payments')
                    ->selectRaw('user_id, currency, sum(amount)*(-1) as balance')
                    ->where('person_id', Auth::user()->id)
                    ->whereBetween('account', [20000, 39999])
                    ->groupBy('currency', 'user_id');

      $balance4 =   DB::table('transactions')
                    ->selectRaw('person_id as user_id, currency, sum(amount)*(-1) as balance')
                    ->where('user_id', Auth::user()->id)
                    ->whereBetween('credit', [20000, 39999])
                    ->groupBy('currency', 'person_id');

      $balance5 =   DB::table('transactions')
                    ->selectRaw('user_id, currency, sum(amount) as balance')
                    ->where('person_id', Auth::user()->id)
                    ->whereBetween('credit', [20000, 39999])
                    ->groupBy('currency', 'user_id');

      $balance6 =   $balance1->unionAll($balance2)->unionAll($balance3)->unionAll($balance4)->unionAll($balance5);

      $balance7 =   $balance6->toSql();

      $balance8 =   DB::table(DB::raw("($balance7) as bbb"))->mergeBindings($balance6)
                    ->join('exchangerates', 'bbb.currency', '=', 'exchangerates.first_currency')
                    ->selectRaw('bbb.user_id, sum(bbb.balance) * exchangerates.rate as balance')
                    ->groupBy('bbb.user_id', 'bbb.currency', 'exchangerates.rate' );

      $balance9 =   $balance8->toSql();

      $newsfeeds=   DB::table(DB::raw("($balance9) as ccc"))->mergeBindings($balance8)
                    ->join('users', 'ccc.user_id', '=', 'users.id')
                    ->selectRaw('ccc.user_id as person_id, users.first_name, users.last_name, users.image, sum(balance) as balance')
                    ->groupBy('ccc.user_id', 'users.first_name', 'users.last_name', 'users.image')
                    ->paginate(10);

      $info     =   information::where('user_id', Auth::user()->id)->get();

      return view('loans.index', ['newsfeeds' => $newsfeeds, 'info' => $info]);
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
