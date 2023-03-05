<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificacionesComponent extends Component
{
    public $notificaciones, $noleidas;
    protected $listeners = ['infonotificaciones'];

    public function mount()
    {
        $this->infonotificaciones();
    }

    public function render()
    {
        return view('livewire.notificaciones-component');
    }

    public function marcarleida($notificacion_id)
    {
        $notificacion = auth()->user()->notifications()->findOrFail($notificacion_id);
        $notificacion->markAsRead();
    }

    public function infonotificaciones()
    {
        $this->notificaciones = auth()->user()->notifications;
        $this->noleidas = auth()->user()->unreadNotifications->count();
    }
}
