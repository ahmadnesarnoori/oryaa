<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\information;
use App\User;
use Auth;
use Image;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($person_id)
    {
      $deposit1  =  DB::table('deposits')
                    ->SelectRaw('id, user_id, bank_id as person_id, created_at, description, account, amount, currency, "Deposit" as type, file')
                    ->Where('user_id', Auth::user()->id)->where('bank_id', $person_id);

      $deposit2  =  DB::table('deposits')
                    ->SelectRaw('id, bank_id as user_id, user_id as person_id, created_at, description, account, amount, currency, "Received" as type, file')
                    ->where('bank_id', Auth::user()->id)->where('user_id', $person_id);

      $payment1  =  DB::table('payments')
                    ->SelectRaw('id, user_id, person_id, created_at, description, account, amount, currency, "received" as type, file')
                    ->where('user_id', Auth::user()->id)->where('person_id', $person_id);

      $payment2  =  DB::table('payments')
                    ->SelectRaw('id, person_id as user_id, user_id as person_id, created_at, description, second_account as account, amount, currency, "paid" as type, file')
                    ->where('person_id', Auth::user()->id)->where('user_id', $person_id);

      $trans1    =  DB::table('transactions')
                    ->join('accounts', 'transactions.credit', '=', 'accounts.id')
                    ->SelectRaw('transactions.id, transactions.user_id, transactions.person_id, transactions.created_at, transactions.description, transactions.debit as account, transactions.amount, transactions.currency, concat( "sold on a ", accounts.account) as type, transactions.file')
                    ->where('user_id', Auth::user()->id)->where('person_id', $person_id);

      $trans2    =  DB::table('transactions')
                    ->join('accounts', 'transactions.credit', '=', 'accounts.id')
                    ->SelectRaw('transactions.id, transactions.person_id as user_id, transactions.user_id as person_id, transactions.created_at, transactions.description, transactions.second_account as account, transactions.amount, transactions.currency, concat("bought on a ", accounts.account) as type, transactions.file')
                    ->where('person_id', Auth::user()->id)->where('user_id', $person_id);

      $post1     =  DB::table('posts')
                    ->SelectRaw('id, user_id, user_id as person_id, created_at, content as description, heading as account, type as amount, null as currency, "Post" as type, posts.file')
                    ->where('user_id', $person_id);

      $exchangeA =  DB::table('exchanges')
                    ->join('currencies', 'exchanges.from_currency', '=', 'currencies.id')
                    ->selectRaw('exchanges.id, exchanges.user_id, exchanges.person_id, exchanges.created_at, null as description, concat("With ", exchanges.from_amount," ", currencies.currency, " (",currencies.description, ")") as account, exchanges.to_amount as amount, exchanges.to_currency as currency, "Exchange" as type, "null" as file')
                    ->where('exchanges.user_id', Auth::user()->id)->where('exchanges.person_id', $person_id);

      $exchangeB =  DB::table('exchanges')
                    ->join('currencies', 'exchanges.to_currency', '=', 'currencies.id')
                    ->selectRaw('exchanges.id, exchanges.person_id as user_id, exchanges.user_id as person_id, exchanges.created_at, null as description, concat("with ", exchanges.to_amount," ", currencies.currency, " (", currencies.description, ")") as account, exchanges.from_amount as amount, exchanges.from_currency as currency, "Exchange" as type, "null" as file')
                    ->where('exchanges.person_id', Auth::user()->id)->where('exchanges.user_id', $person_id);

      $quarie1   =  $deposit1->unionAll($deposit2)->unionAll($payment1)->unionAll($payment2)->unionAll($trans1)->unionAll($trans2)->unionAll($post1)->unionAll($exchangeA)->unionAll($exchangeB);
      $quarie2   =  $quarie1->toSql();
      $quarie3   =  DB::table(DB::raw("($quarie2) as aaa"))->mergeBindings($quarie1)
                    ->leftjoin('currencies', 'aaa.currency', '=', 'currencies.id')
                    ->join('users', 'aaa.person_id','=','users.id')
                    ->leftjoin('accounts', 'aaa.account','=','accounts.id')
                    ->select('aaa.id', 'aaa.user_id', 'aaa.person_id', 'users.name', 'users.first_name', 'users.last_name', 'users.image',
                    'aaa.created_at', 'aaa.description', 'aaa.account as account_number', 'accounts.account', 'aaa.amount', 'aaa.currency as currency_id', 'currencies.currency', 'aaa.type', 'aaa.file')
                    ->latest()
                    ->paginate(10);

      $info     =   information::where('user_id', $person_id)->get();

      $balance1 =   DB::table('deposits')
                    ->SelectRaw('currency, account, sum(amount) as balance')
                    ->where('user_id', Auth::user()->id)->where('bank_id', $person_id)
                    ->groupBy('currency', 'account');

      $balance2 =   DB::table('payments')
                    ->selectRaw('currency, account, sum(amount) as balance')
                    ->where('user_id', Auth::user()->id)->where('person_id', $person_id)
                    ->whereBetween('account', [20000, 39999])
                    ->groupBy('currency', 'account');

      $balance3 =   DB::table('payments')
                    ->selectRaw('currency, account, sum(amount)*(-1) as balance')
                    ->where('person_id', Auth::user()->id)->where('user_id', $person_id)
                    ->whereBetween('account', [20000, 39999])
                    ->groupBy('currency', 'account');

      $balance4 =   DB::table('transactions')
                    ->selectRaw('currency, credit as account, sum(amount)*(-1) as balance')
                    ->where('user_id', Auth::user()->id)->where('person_id', $person_id)
                    ->whereBetween('credit', [20000, 39999])
                    ->groupBy('currency', 'credit');

      $balance5 =   DB::table('transactions')
                    ->selectRaw('currency, credit as account, sum(amount) as balance')
                    ->where('person_id', Auth::user()->id)->where('user_id', $person_id)
                    ->whereBetween('credit', [20000, 39999])
                    ->groupBy('currency', 'credit');

      $balance6 =   $balance1->unionAll($balance2)->unionAll($balance3)->unionAll($balance4)->unionAll($balance5);

      $balance7 =   $balance6->toSql();

      $balance8 =   DB::table(DB::raw("($balance7) as bbb"))->mergeBindings($balance6)
                    ->join('accounts', 'bbb.account', '=', 'accounts.id')
                    ->join('currencies', 'bbb.currency', '=', 'currencies.id')
                    ->selectRaw('bbb.currency as id, currencies.currency, currencies.image, concat(bbb.account, " . ", accounts.account) as rate, sum(balance) as balance, null as status, null as value')
                    ->groupBy('bbb.currency','currencies.currency', 'currencies.image', 'bbb.account', 'accounts.account', 'status', 'value')
                    ->get();


      $users    =   User::where('id', $person_id)->get();

      $following=   DB::table('followers')
                      ->selectRaw('count(distinct(person_id)) as following')
                      ->where('user_id', $person_id)
                      ->get();

      $followers=   DB::table('followers')
                      ->selectRaw('count(distinct(user_id)) as followers')
                      ->where('person_id', $person_id)
                      ->get();

      $posts    =   DB::table('posts')
                      ->selectRaw('count(user_id) as posts')
                      ->where('user_id', $person_id)
                      ->get();


      return view('users.usersprofile', ['newsfeeds' => $quarie3, 'info' => $info,  'balance' =>
        $balance8, 'users' => $users, 'following' => $following, 'followers' => $followers, 'posts' => $posts]);
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
     * @param  \Illuminate\Http\Request  $requestz
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $userUpdate = User::where('id', $user->id)
      ->update([
          'image' => Auth::user()->id.'.'.'jpg'
      ]);

      $this->validate($request, [
        'image' => 'mimes:jpg,jpeg,png|max:1000'
      ]);

      $originalImage= $request->file('image');
      $thumbnailImage = Image::make($originalImage);
      $thumbnailPath = public_path().'/storage/images/newsfeeds/';
      $originalPath = public_path().'/storage/images/profile/';
      $thumbnailImage->resize(100, 100);
      $thumbnailImage->save($originalPath.Auth::user()->id.'.'.'jpg');
      $thumbnailImage->resize(50,50);
      $thumbnailImage->save($thumbnailPath.Auth::user()->id.'.'.'jpg');

      return redirect()->back()->with('success', 'You have successfuly updated your profile picture.');
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
