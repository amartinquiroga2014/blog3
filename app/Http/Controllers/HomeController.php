<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show(){        
            $posts = Post::with([
               'comments' => function($query){
                    $query->orderBy('id','desc')->limit(2);
               },
                               ])->get();
            return view('Welcome')->with('posts', $posts); 
    }
}
