<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $usuarios = User::where('id','<>',auth()->user()->id)->get();
        return view('dashboard', compact('usuarios'));
    }
}
