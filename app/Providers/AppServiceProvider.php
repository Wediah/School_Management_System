<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Listeners\AssignProfiletoUser;
use App\Listeners\SendAssignmentNotification;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
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

        Event::listen(
            UserRegistered::class,
            AssignProfiletoUser::class
        );

        Gate::define('student', function (User $user) {
            return $user->role->name === 'Student'
                ? Response::allow()
                : Response::deny('You must be a student');
        });

        Gate::define('lecturer', function (User $user) {
            return $user->role->name === 'Lecturer'
                ? Response::allow()
                : Response::deny('You must be a lecturer');
        });

        Gate::define('admin', function (User $user) {
            return $user->role->name === 'Admin'
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
