<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Configuracao;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       //check that app is local
        if (!$this->app->isLocal()) {
            //else register your services you require for production
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $configuracao = Configuracao::first();
            $view->with(compact('configuracao'));
        });
    }
}
