<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\VonageMessage;

class WelcomeNotification extends Notification  implements ShouldQueue
{
    use Queueable;
    protected $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];

    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting('Welcome!' . $this->user->name . ',')
                    ->line('You have successfully registered to join ATU')
                    ->action('check it out', url('/'))
                    ->line('Best regards!')
                    ->from('atu@gmail.com', 'ATU');
    }

//    public function toVonage(object $notifiable): VonageMessage
//    {
//        return (new VonageMessage())
//            ->content("You are welcome to ATU, don't share credentials with anyone");
//    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
