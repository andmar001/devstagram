<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //autenticacion
    //muestra antes de mostrar el index que el usuario este autenticado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('dashboard',[
            'user' => $user,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    // guarda y valida en la base de datos
    public function store( Request $request)
    {
        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);

        //crear el post
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id, //guarda el id del usuario que esta autenticado
        // ]);

        //Otra forma de guardar en la base de datos
        $post = new Post; //crea una nueva instancia de la clase Post
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id;
        $post->save(); //guardar en la base de datos

        //Llevar al muro del usuario
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
