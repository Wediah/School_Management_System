<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $welcomeData = [
            'body' => 'You are welcome, it is a test',
            'welcomeText' => 'You have been successfully Registered, you are welcome to Atu',
            'url' => url('/'),
            'thankyou' => 'Thank you for signing up'
        ];

        $user->notify(new WelcomeNotification($welcomeData));
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
