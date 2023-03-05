<?php

namespace App\Notifications;

use App\Models\Mensaje;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MensajeEnviadoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $mensaje;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database','broadcast'];
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
                    ->subject('Tienes un nuevo mensaje')
                    ->greeting('Saludos')
                    ->line('Hola alguien te envió un mensaje.')
                    ->action('Ver mensaje', route('mensaje.show',$this->mensaje))
                    ->line('Hasta luego!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'url' => route('mensaje.show',$this->mensaje),
            'mensaje' => 'Has recibido un mensaje de '.User::find($this->mensaje->from_user_id)->name
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([]);
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
}
