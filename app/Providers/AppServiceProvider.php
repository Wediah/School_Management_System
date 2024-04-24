<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Gate::define('student', function (User $user) {
            return $user->role->name === 'student'
                ? Response::allow()
                : Response::deny('You must be a student');
        });

        Gate::define('lecturer', function (User $user) {
            return $user->role->name === 'lecturer'
                ? Response::allow()
                : Response::deny('You must be an lecturer');
        });

        Gate::define('admin', function (User $user) {
            return $user->role->name === 'admin'
                ? Response::allow()
                : Response::deny('You must be an administrator');
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });

        Blade::if('lecturer', function () {
            return request()->user()?->can('lecturer');
        });

        Blade::if('student', function () {
            return request()->user()?->can('student');
        });
    }
}
