<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    // metodo para GUARDAR la imagen
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        // generar un id unico para cada una de las imagenes
        $nombreImagen = Str::uuid() . '.' . $imagen->extension();
        
        // imagen guardada en el servidor
        $imagenServidor = Image::make($imagen);
        //cada imagen va a medir 1000 x 1000px
        $imagenServidor->fit(1000, 1000); //height y width

        // guardar la imagen en el servidor
        $imagenPath = public_path('uploads' . '/' . $nombreImagen);
        $imagenServidor->save($imagenPath); //guardar la imagen en el servidor

        //validar que el archivo sea una imagen
        return response()->json(['imagen' => $nombreImagen]);
    }
}


// cuando se sube una imagen se va a uploads y se guarda con un nombre unico
// solo se guarda el ui de la imagen en la base de datos, no la imagen en si