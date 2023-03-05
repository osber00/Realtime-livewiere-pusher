<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mensaje;
use Illuminate\Http\Request;
use App\Notifications\MensajeEnviadoNotification;

class MensajeController extends Controller
{
    public function show(Mensaje $mensaje)
    {
        dd($mensaje);
    }

    public function store(Request $request)
    {
        $rules = self::rules();
        $mensajes = self::mensajes();
        $this->validate($request,$rules,$mensajes);
        $mensaje = Mensaje::create([
            'from_user_id'  => auth()->user()->id,
            'to_user_id'    => $request->usuario,
            'asunto'        => $request->asunto,
            'mensaje'       => $request->mensaje
        ]);
        $destinario = User::find($request->usuario);
        $destinario->notify(new MensajeEnviadoNotification($mensaje));
        return back()->with('mensaje-enviado','El mensaje fue enviado a '.$destinario->name);
    }

    protected static function rules()
    {
        return [
            'usuario'   => 'required|exists:users,id',
            'asunto'    => 'required|min:5|max:120',
            'mensaje'   => 'required|min:10|max:500'
        ];
    }

    protected static function mensajes()
    {
        return [
            'required'  => 'Este campo es obligatorio',
            'exists'    => 'Dato inválido',
            'min'       => 'Debe ingresar al menos :min caracteres',
            'max'       => 'Debe ingresar máximo :max caracteres'
        ];
    }
}
