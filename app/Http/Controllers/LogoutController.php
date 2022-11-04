<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        auth()->logout();
        //redireccionar a la pagina principal
        return redirect()->route('login');
    }
}
