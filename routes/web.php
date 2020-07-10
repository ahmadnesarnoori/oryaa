<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

Route::get('/', function () {return view('welcome');});

Route::view('about-us', 'pages.aboutus');
Route::view('contact-us', 'pages.contact-us');
Route::view('privacy_policy', 'pages.privacypolicy');
Route::view('languages', 'pages.languages');
Route::view('career', 'pages.career');
Route::view('under-development', 'pages.underdevelopment');
Route::view('help-center', 'pages.help');
Route::view('nesar-ahmad-noori', 'pages.nesarahmadnoori');
Route::view('therms', 'pages.therms');
Route::view('previous_versions', 'pages.versions');
Route::view('researches', 'research.home');
Route::view('peer-to-peer-electronic-accounting-system', 'research.ptpeas');
Route::view('how-to-develop-a-peer-to-peer-electronic-accounting-system', 'research.htdaptpeas');
Route::view('double-entry-accounting-scalability-to-the-current-technology', 'research.deasttct');

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('test', 'TestController')->middleware('verified');
Route::resource('following', 'FollowingController')->middleware('verified');
Route::resource('followers', 'FollowersController')->middleware('verified');
Route::resource('posts', 'PostsController')->middleware('verified');
Route::resource('incomestatment', 'IncomeStatmentsController')->middleware('verified');
Route::resource('balancesheet', 'BalanceSheetsController')->middleware('verified');
Route::resource('indexes', 'IndexesController')->middleware('verified');
Route::resource('indexfollowers', 'IndexFollowersController')->middleware('verified');
Route::resource('exchangerates', 'ExchangeRatesController')->middleware('verified');
Route::resource('blog', 'BlogsController');
Route::resource('payments', 'PaymentsController')->middleware('verified');
Route::resource('transactions', 'TransactionsController')->middleware('verified');
Route::resource('exchanges', 'OfferExchangesController')->middleware('verified');
Route::resource('cashsales', 'CashSalescontroller')->middleware('verified');
Route::resource('creditsales', 'CreditSalesController')->middleware('verified');
Route::resource('message', 'MessagesController')->middleware('verified');
Route::resource('messages', 'MessagesController')->middleware('verified');
Route::resource('information', 'InformationController')->middleware('verified');
Route::resource('journalentries', 'JournalEntriesController')->middleware('verified');
Route::resource('profile', 'ProfileController')->middleware('verified');
Route::resource('followers', 'FollowersController')->middleware('verified');
Route::resource('watchlist', 'WatchListController')->middleware('verified');
Route::resource('setting', 'SettingsController')->middleware('verified');
Route::resource('offerexchanges', 'OfferExchangesController')->middleware('verified');
Route::resource('acceptexchanges', 'AcceptExchangesController')->middleware('verified');
Route::resource('like', 'LikeController')->middleware('verified');
Route::resource('users', 'UsersController')->middleware('verified');
Route::resource('covers', 'UserController')->middleware('verified');
Route::resource('loans', 'LoansController')->middleware('verified');
Route::get('message-{person_id}', 'UserMessagesController@index')->middleware('verified');
Route::get('profile-{person_id}', 'UsersController@index')->middleware('verified');
Route::get('userfollowers-{person_id}', 'UserFollowersController@index')->middleware('verified');
Route::get('userfollowing-{person_id}', 'UserFollowingController@index')->middleware('verified');
Route::get('hashtag-{heading}', 'HashtagController@index')->middleware('verified');
Route::view('image', 'upload.profile')->middleware('verified');

Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $user = User::where('name','LIKE','%'.$q.'%')
    ->orWhere('email','LIKE','%'.$q.'%')
    ->orWhere('id', 'LIKE', '%'.$q.'%')
    ->orWhere('first_name', 'LIKE' , '%'.$q.'%')
    ->orWhere('last_name', 'LIKE' , '%'.$q.'%')
    ->orWhere('phone_number', 'LIKE', '%'.$q.'%')
    ->orWhere('address', 'LIKE', '%'.$q.'$')
    ->orWhere('city', 'LIKE', '%'.$q.'%')
    ->orWhere('country', 'LIKE', '%'.$q.'%')
    ->paginate(10);
    if(count($user) > 0)
        return view('search.result')->withDetails($user)->withQuery ( $q );
    else return view ('search.noresult')->withMessage('No Details found. Try to search again !');
});

