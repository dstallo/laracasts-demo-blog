<?php

namespace App\Providers;

//use Illuminate\Pagination\Paginator;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use App\Services\MailchimpNewsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Service container binding for resolution of Newsletter interface, which defaults to MailchimpNewsletter
        app()->bind(Newsletter::class, function() {
            return new MailchimpNewsletter(new ApiClient());
        });
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Paginator::useTailwind();
        Model::unguard();
    }
}
