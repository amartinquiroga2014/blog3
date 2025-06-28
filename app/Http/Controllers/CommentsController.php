<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        // Validacion del Comentario
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        // Creacion del comentario en BD
        Comment::create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'post_id' => $post->id,
        ]);

        return back();
    }
}