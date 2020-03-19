<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RepliedToThread extends Notification
{
    use Queueable;

    public $thread;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($thread)
    {
        //
        $this->thread = $thread;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /**

     * Get the array representation of the notification.

     *

     * @param  mixed  $notifiable

     * @return array

     */

    //gửi thông báo qua database

    public function toDatabase($notifiable)

    {

        return[

            'thread'=>$this->thread,

            'user'=>auth()->user()

        ];

    }

    //gửi thông báo qua broadcasr

    public function toBroadcast($notifiable)

    {

        return new BroadcastMessage([

            'thread'=>$this->thread,

            'user'=>auth()->user()

        ]);

    }

}
