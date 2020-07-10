<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\information;
use App\User;
use Auth;

class BalanceSheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $as1  = DB::table('deposits')
                ->selectRaw('1000 as account, currency, sum(amount) as balance')
                ->where('user_id', Auth::user()->id)
                ->groupBy('account', 'currency');

        $as2  = DB::table('deposits')
                ->selectRaw('account, currency, sum(amount)*(-1) as balance')
                ->where('user_id', Auth::user()->id)
                ->groupBy('account', 'currency');

        $bs1  = DB::table('payments')
                ->selectRaw('account, currency, sum(amount) as balance')
                ->where('user_id', Auth::user()->id)->where('account', '<', 40000)
                ->groupBy('account', 'currency');

        $bs2  = DB::table('payments')
                ->selectRaw('1000 as account, currency, sum(amount)*(-1) as balance')
                ->where('user_id', Auth::user()->id)
                ->groupBy('account', 'currency');

        $bs3  = DB::table('payments')
                ->selectRaw('1000 as account, currency, sum(amount) as balance')
                ->where('person_id', Auth::user()->id)
                ->groupBy('account', 'currency');

        $bs4  = DB::table('payments')
                ->selectRaw('account as account, currency, sum(amount)*(-1) as balance')
                ->where('person_id', Auth::user()->id)->whereBetween('account', [20000, 39999])
                ->groupBy('account', 'currency');

        $bs5  = DB::table('payments')
                ->selectRaw('second_account as account, currency, sum(amount)*(-1) as balance')
                ->where('person_id', Auth::user()->id)->whereNotBetween('account', [20000, 39999])->where('second_account', '<', 40000)
                ->groupBy('second_account', 'currency');

        $bs6  = DB::table('transactions')
                ->selectRaw('debit as account, currency, sum(amount) as balance')
                ->where('user_id', Auth::user()->id)->where('debit', '<', 40000)
                ->groupBy('debit', 'currency');

        $bs7  = DB::table('transactions')
                ->selectRaw('credit as account, currency, sum(amount)*(-1) as balance')
                ->where('user_id', Auth::user()->id)->where('credit', '<', 40000)
                ->groupBy('credit', 'currency');

        $bs8  = DB::table('exchanges')
                ->selectRaw('1000 as account, from_currency as currency, sum(from_amount)*(-1) as balance')
                ->where('user_id', Auth::user()->id)->whereNotNull('person_id')
                ->groupBy('account', 'from_currency');

        $bs9  = DB::table('exchanges')
                ->selectRaw('1000 as account, to_currency as currency, sum(to_amount) as balance')
                ->where('user_id', Auth::user()->id)->whereNotNull('person_id')
                ->groupBy('account', 'to_currency');

        $bs10 = DB::table('exchanges')
                ->selectRaw('1000 as account, from_currency as currency, sum(from_amount) as balance')
                ->where('person_id', Auth::user()->id)
                ->groupBy('account', 'from_currency');

        $bs11 = DB::table('exchanges')
                ->selectRaw('1000 as account, to_currency as currency, sum(to_amount)*(-1) as balance')
                ->where('person_id', Auth::user()->id)
                ->groupBy('account', 'to_currency');

        $bs12  = DB::table('journalentries')
                ->selectRaw('debit as account, currency, sum(amount) as balance')
                ->where('user_id', Auth::user()->id)->Where('debit', '<', 40000)
                ->groupBy('debit', 'currency');

        $bs13 = DB::table('journalentries')
                ->selectRaw('credit as account, currency, sum(amount)*(-1) as balance')
                ->where('user_id', Auth::user()->id)->where('credit', '<', 40000)
                ->groupBy('credit', 'currency');

                $is1  = DB::table('payments')
                        ->selectRaw('currency, sum(amount) as balance')
                        ->where('user_id', Auth::user()->id)->where('account', '>=', 40000)
                        ->groupBy('currency');

                $is2  = DB::table('payments')
                        ->selectRaw('currency, sum(amount)*(-1) as balance')
                        ->where('person_id', Auth::user()->id)->whereNotBetween('account', [20000, 40000])->where('second_account', '>=', 40000)
                        ->groupBy('currency');

                $is3  = DB::table('transactions')
                        ->selectRaw('currency, sum(amount) as balance')
                        ->where('user_id', Auth::user()->id)->where('debit', '>=', 40000)
                        ->groupBy('currency');

                $is4  = DB::table('transactions')
                        ->selectRaw('currency, sum(amount)*(-1) as balance')
                        ->where('person_id', Auth::user()->id)->where('second_account', '>=', 40000)
                        ->groupBy('currency');

                $is5  = DB::table('exchanges')
                        ->selectRaw('from_currency as currency, sum(from_amount) as balance')
                        ->where('user_id', Auth::user()->id)->whereNotNull('person_id')
                        ->groupBy('from_currency');

                $is6  = DB::table('exchanges')
                        ->selectRaw('to_currency as currency, sum(to_amount)*(-1) as balance')
                        ->where('user_id', Auth::user()->id)->whereNotNull('person_id')
                        ->groupBy('to_currency');

                $is7  = DB::table('exchanges')
                        ->selectRaw('from_currency as currency, sum(from_amount)*(-1) as balance')
                        ->where('person_id', Auth::user()->id)
                        ->groupBy('from_currency');

                $is8  = DB::table('exchanges')
                        ->selectRaw('to_currency as currency, sum(to_amount) as balance')
                        ->where('person_id', Auth::user()->id)
                        ->groupBy('to_currency');

                $is9  = DB::table('journalentries')
                        ->selectRaw('currency, sum(amount) as balance')
                        ->where('user_id', Auth::user()->id)->Where('debit', '>=', 40000)
                        ->groupBy('currency');

                $is10 = DB::table('journalentries')
                        ->selectRaw('currency, sum(amount)*(-1) as balance')
                        ->where('user_id', Auth::user()->id)->where('credit', '>=', 40000)
                        ->groupBy('currency');

                $is11 = $is1->unionAll($is2)->unionAll($is3)->unionAll($is4)->unionAll($is5)->unionAll($is6)
                        ->unionAll($is7)->unionAll($is8)->unionAll($is9)->unionAll($is10);
                $is12 = $is11->tosql();

        $bs14 = DB::table(DB::raw("($is12) as bbb"))->mergeBindings($is11)
                ->selectRaw('39999 as account, bbb.currency, sum(bbb.balance) as balance')
                ->groupBy('account', 'currency');

        $bs15 = $as1->unionAll($as2)->unionAll($bs1)->unionAll($bs2)->unionAll($bs3)->unionAll($bs4)->unionAll($bs5)->unionAll($bs6)->unionAll($bs7)->unionAll($bs8)->unionAll($bs9)->unionAll($bs10)->unionAll($bs11)->unionAll($bs12)->unionAll($bs13)->unionAll($bs14);

        $bs16 = $bs15->toSql();
        $bs17 = DB::table(DB::raw("($bs16) as aaa"))->mergeBindings($bs15)
                ->join('exchangerates', 'aaa.currency', '=', 'exchangerates.first_currency')
                ->selectRaw('aaa.account, sum(aaa.balance)*exchangerates.rate as balance')
                ->groupBy('account', 'rate');

        $bs18 = $bs17->toSql();
        $final= DB::table(DB::raw("($bs18) as bbb"))->mergeBindings($bs17)
                ->join('accounts', 'bbb.account', '=', 'accounts.id')
                ->selectRaw('bbb.account as account_number, accounts.account, sum(bbb.balance) as balance')
                ->groupBy('account_number', 'account')
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
