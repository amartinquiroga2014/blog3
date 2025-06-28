<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Stringable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class CommentsForbiddenWords
{
    // Ejemplo de palabras censuradas
    protected $forbidden = [
        'que',
        'Framework',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        foreach($this->forbidden as $word){
             $request->merge([
                'name' => Str::replace($word, '****', $request->input('name')),
                'content' => Str::replace($word, '****', $request->input('content')),
             ]);
        
            }
        return $next($request);
    }
}
