<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CommentsForbiddenWords;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/',[HomeController::class,"show"]);

Route::controller(PostsController::class)->group(function () {
        Route::middleware('auth')->group(function(){
                Route::get('/posts/create', "create");
                Route::get('/posts/{post}', "show");
                Route::post('/posts', "store");
                Route::get('/posts/{post}/edit', "edit");
                Route::patch('/posts/{post}', "update");
                Route::delete('/posts/{post}', "destroy");
         });        
}); 

//Route::post('/posts/{post}/comments', [CommentsController::class, 'store']);

Route::post('/posts/{post}/comments', [CommentsController::class, 'store'])
         ->middleware(CommentsForbiddenWords::class);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('once', function (){

    $tokenServiceA = new TokenService;
    $tokenServiceB = new TokenService;

    $tokenServiceA->getToken();
    $tokenServiceA->getToken();
    $tokenServiceA->getToken();
    $tokenServiceA->getToken();
    $tokenServiceA->getToken();

    $tokenServiceB->getToken();
    $tokenServiceB->getToken();
    $tokenServiceB->getToken();
    $tokenServiceB->getToken();
    $tokenServiceB->getToken();

     return $tokenServiceA->getToken();
});

class TokenService{

   function getToken(){
       return once( function(){
           dump('Hello Once' . rand(1, 999));
            return Storage::get('token.txt');
                              });    
    }
}

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
