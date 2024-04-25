<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\profile;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AssignProfiletoUser implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $user = $event->user;

//        Log::info('User registered event triggered. User ID: ' . $user->id);

//      $profile = new Profile([
        $profile = Profile::create([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'department_id' => $user->department_id,
            'program_id' => $user->program_id,
            'role_id' => $user->role_id,
            'status_id' => $user->status_id,
        ]);

//        $user->profile()->save($profile);

//        try {
//            $user->profile()->save($profile);
//        } catch (Exception $e) {
//            Log::error('Failed to create profile: ' . $e->getMessage());
//        }



    }
}
