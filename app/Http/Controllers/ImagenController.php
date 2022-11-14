<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenController extends Controller
{
    // metodo para GUARDAR la imagen
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        //validar que el archivo sea una imagen
        return response()->json(['imagen' => 'probando respuesta']);
    }

}
