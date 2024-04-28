<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\VonageMessage;

class WelcomeNotification extends Notification  implements ShouldQueue
{
    use Queueable;
    private $welcomeData;

    /**
     * Create a new notification instance.
     */
    public function __construct($welcomeData)
    {
        $this->welcomeData = $welcomeData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'vonage'];

    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line($this->welcomeData['body'])
                    ->action($this->welcomeData['welcomeText'], $this->welcomeData['Url'])
                    ->line($this->welcomeData['thankyou']);
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
