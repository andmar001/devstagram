<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store( Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        // false en caso que el usuario no se autentique
        if(!auth()->attempt($request->only('email','password'), $request->remember )){
            // regresate a la pagina anterior con el mensaje de error
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        //si se autentico correctamente
        return redirect()->route('posts.index');
    }

}
