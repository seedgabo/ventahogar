<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisteredContact extends Notification
{
    use Queueable;
    public $msg;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$msg)
    {
        $this->user = $user;
        $this->msg = $msg;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->subject('Nuevo Contacto Registrado')
                    ->greeting('Hola! ' . $notifiable->name)
                    ->line('Un nuevo usuario ha sido registrado en el sistema')
                    ->line("Usuario: ". $this->user->name)
                    ->line("Email: ". $this->user->email)
                    ->line("Phone: ". $this->user->phone)
                    ->action('Ver Usuario', url('admin/contacts/' . $this->user->id))
                    ->line("Mensaje: " . $this->msg)
                    ->line('No olvide contactarlo');
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
            'user_id' => $this->user->id,
            'msg' => $this->msg
        ];
    }
}
