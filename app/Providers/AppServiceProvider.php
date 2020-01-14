<?php

namespace App\Providers;

use App\Channel;
use App\Http\View\Composers\ChannelsComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         *OPTION 1 - Every single view
         *
         * */

        //  view()->share('channels', Channel::orderBy('name')->get());


        /**
         *Noticed case sensitivity in function $view parameters
         *OPTION 2 - Granular views with wildcards
         *(WildCard:Meaning that every single view that is associated with the view would be affected)
         *
         * */

        //   View::Composer(['post.*', 'channel.*'], function($view) {
        //     $view->with('channels', Channel::orderBy('name')->get());
        //   });


            /**OPTION 3 - Dedicated Class
             *
             */

            View::composer(['post.*', 'channel.index'], ChannelsComposer::class);


    }
}
