<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {       
        // Validamos los campos ingresados 
        // con el archivo PostRequest
 
        // Creamos el Post
        Post::create([
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'content' => $request->input('content'),
         ]);

         return redirect('/');
    }

    public function show(Post $post)
    {
        // Encuentra el Post con RMB
        
        // Recuperar los comentarios, usando la relacion.
           $comments = $post->comments;

        // Enviar al view el Post y sus comentarios
          return view('posts.show')->with([
              'post' => $post,
              'comments' => $comments,
          ]);
    }

    public function edit(Post $post)
    {
        // Consulta las Policies definidas
        //$this->authorize('update',$post);

        // Recuperar la informacion RMB
        return view('posts.edit')->with([
            'post' => $post,
        ]) ;
    }

    public function update(Request $request, Post $post)
    {
        // Consulta las Policies definidas
        // $this->authorize('update',$post);

        $post->update([
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'content' => $request->input('content'),
        ]);

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        // Consulta las Policies definidas
        // $this->authorize('delete',$post);

        $post->delete();
        return redirect('/');
    }
}
