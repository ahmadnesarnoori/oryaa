<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer
        (
            [
            'home',
            'following.index',
            'sales.index',
            'exchangerates.index',
            'exchange.index',
            'indexes.index',
            'messages.index',
            'profile.index',
            'watchlist.index',
            'followers.index',
            'information.index',
            'setting.index',
            'financialstatments.financialstatment',
            'search.result',
            'search.noresult',
            'upload.profile',
            'loans.index'
            ],

            'App\Http\ViewComposers\HomeComposer'
         );

        View::composer
        (
            [
            'profile.index',
            'users.usersprofile',
            'users.usermessages',
            'users.userfollowers',
            ],

            'App\Http\ViewComposers\UsersComposer'
         );

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
