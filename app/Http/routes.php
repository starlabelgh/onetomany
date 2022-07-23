<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
    $user = User::findorFail(1);

    $user->posts()->save(new Post(['title' => 'my first post', 'body'=>'laravel is what willl get me a job']));
    //return view('Data Inserted Successfully');
    
});

Route::get('/read', function(){
    $user = User::findOrFail(1);

    dd($user->posts);

});

Route::get('/update', function(){
    $user = User::find(1);

    $user->posts()->whereId(1)->update(['title'=>'I love laravel', 'body'=>'update the data']);
});
