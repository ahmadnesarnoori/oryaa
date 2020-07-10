<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\information;
use App\User;
use Auth;
use Carbon\Carbon;

class IncomeStatmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is1  = DB::table('payments')
                ->selectRaw('account, currency, sum(amount) as balance')
                ->where('user_id', Auth::user()->id)->where('account', '>=', 40000)
                ->WhereYear('created_at', Carbon::now()->year)
                ->groupBy('account', 'currency');

        $is2  = DB::table('payments')
                ->selectRaw('second_account, currency, sum(amount)*(-1) as balance')
                ->where('person_id', Auth::user()->id)->whereNotBetween('account', [20000, 39999])
                ->where('second_account', '>=', 40000)
                ->WhereYear('created_at', Carbon::now()->year)
                ->groupBy('second_account', 'currency');

        $is3  = DB::table('transactions')
                ->selectRaw('debit as account, currency, sum(amount) as balance')
                ->where('user_id', Auth::user()->id)->where('debit', '>=', 40000)
                ->WhereYear('created_at', Carbon::now()->year)
                ->groupBy('debit', 'currency');

        $is4  = DB::table('transactions')
                ->selectRaw('second_account as account, currency, sum(amount)*(-1) as balance')
                ->where('person_id', Auth::user()->id)->where('second_account', '>=', 40000)
                ->WhereYear('created_at', Carbon::now()->year)
                ->groupBy('second_account', 'currency');

        $is5  = DB::table('exchanges')
                ->selectRaw('95000 as account, from_currency as currency, sum(from_amount) as balance')
                ->where('user_id', Auth::user()->id)->whereNotNull('person_id')
                ->WhereYear('created_at', Carbon::now()->year)
                ->groupBy('account', 'from_currency');

        $is6  = DB::table('exchanges')
                ->selectRaw('95000 as account, to_currency as currency, sum(to_amount)*(-1) as balance')
                ->where('user_id', Auth::user()->id)->whereNotNull('person_id')
                ->WhereYear('created_at', Carbon::now()->year)
                ->groupBy('account', 'to_currency');

        $is7  = DB::table('exchanges')
                ->selectRaw('95000 as account, from_currency as currency, sum(from_amount)*(-1) as balance')
                ->where('person_id', Auth::user()->id)
                ->WhereYear('created_at', Carbon::now()->year)
                ->groupBy('account', 'from_currency');

        $is8  = DB::table('exchanges')
                ->selectRaw('95000 as account, to_currency as currency, sum(to_amount) as balance')
                ->where('person_id', Auth::user()->id)
                ->WhereYear('created_at', Carbon::now()->year)
                ->groupBy('account', 'to_currency');

        $is9  = DB::table('journalentries')
                ->selectRaw('debit as account, currency, sum(amount) as balance')
                ->where('user_id', Auth::user()->id)->Where('debit', '>=', 40000)
                ->WhereYear('created_at', Carbon::now()->year)
                ->groupBy('debit', 'currency');

        $is10 = DB::table('journalentries')
                ->selectRaw('credit as account, currency, sum(amount)*(-1) as balance')
                ->where('user_id', Auth::user()->id)->where('credit', '>=', 40000)
                ->WhereYear('created_at', Carbon::now()->year)
                ->groupBy('credit', 'currency');

        $is11 = $is1->unionAll($is2)->unionAll($is3)->unionAll($is4)->unionAll($is5)->unionAll($is6)
                ->unionAll($is7)->unionAll($is8)->unionAll($is9)->unionAll($is10);

        $is12 = $is11->toSql();
        $is13 = DB::table(DB::raw("($is12) as aaa"))->mergeBindings($is11)
                ->join('exchangerates', 'aaa.currency', '=', 'exchangerates.first_currency')
                ->selectRaw('aaa.account, sum(aaa.balance)*exchangerates.rate as balance')
                ->groupBy('aaa.account', 'exchangerates.rate');

        $is14 = $is13->toSql();
        $final= DB::table(DB::raw("($is14) as bbb"))->mergeBindings($is13)
                ->join('accounts', 'bbb.account', '=', 'accounts.id')
                ->selectRaw('bbb.account as account_number, accounts.account as account, sum(bbb.balance) as balance')
                ->groupBy('bbb.account', 'accounts.account')
                ->get();

        $info     =   information::where('user_id', Auth::user()->id)->get();

        return view('financialstatments.financialstatment', ['newsfeed' => $final, 'info' => $info]);
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
