<?php

namespace Tonning\Bladebook\Providers;


use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Tonning\Bladebook\Bladebook;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->authorization();
    }

    /**
     * Configure the Horizon authorization services.
     *
     * @return void
     */
    protected function authorization()
    {
        $this->gate();

        Bladebook::auth(function ($request) {
            return
                app()->environment('local') ||
                Gate::check('viewBladebook', [$request->user()]);
        });
    }

    /**
     * Register the Horizon gate.
     *
     * This gate determines who can access Horizon in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewBladebook', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }
}
