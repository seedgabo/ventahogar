<?php

namespace App\Notifications;

use App\Models\Residencia;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewWish extends Notification
{
    use Queueable;
    public $user;
    public $residencia;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user , Residencia $residencia)
    {
        $this->user = $user;
        $this->residencia = $residencia;
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
             ->subject('Nuevo Interes de inmueble')
            ->greeting('Hola! ' . $notifiable->name)
            ->line('El usuario ' . $this->user->name . ' tiene un nuevo interes en un inmueble')
            ->line('Inmueble: ' . $this->residencia->nombre)
            ->line('No olvide ponerse en contacto')
            ->action('Ver Residencia', url('admin/residencia/'. $this->residencia->id));
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
            'residencia_id' => $this->residencia->id
        ];
    }
}
