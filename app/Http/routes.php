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

use App\statuslike;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'web'], function () {


    route::get('login', function () {
        return view('auth.login');
    });
//    route::get('login','Auth\AuthController@login');
    route::post('/login', 'Auth\AuthController@postLogin');
    Route::get('/logout', 'Auth\AuthController@logout');
    route::get('/register','User\UserController@register');

    route::post('/register', 'User\UserController@insert');

    //Profile
    Route::get('/social/profile','User\UserController@index');
    Route::get('/social/guestuser/{id}','User\UserController@guestprofile');
    Route::post('/social/newprofile','User\UserController@update');
    Route::post('/social/{id}',['as'=> 'timeline','uses'=> 'social\SocialController@index']);

    Route::get('/social/{id}','social\SocialController@index');
    Route::get('/timeline','social\SocialController@timeline');

    //Post
    route::resource('social','social\SocialController');
    Route::get('/social/edit/{id}','social\SocialController@editPost');
    Route::get('/updatepost/{data}','social\SocialController@updatePost');
    Route::get('/social/delete/{id}','social\SocialController@deletePost');
    Route::post('/timeline',['as'=> 'timeline','uses'=> 'social\SocialController@uploadPost']);
    Route::post('/home',['as'=> 'home','uses'=> 'social\SocialController@uploadPosthome']);
    Route::get('/home','social\SocialController@home');
//    Route::post('/backhome','social\SocialController@home');


    //Comment
//    Route::post('comment',['as'=>'social','uses'=>'social\CommentController@postComment']);
    Route::get('comment/{datastring}','social\CommentController@postComment');
    Route::get('homecomment/{datastring}','social\CommentController@postComment');

    Route::get('/comment/edit/{data}','social\CommentController@update');
    Route::get('/comment/delete/{id}','social\CommentController@delete');
    Route::get('timelineCommentlike/{datastring}','social\LikeController@postLike');

    //Like
    Route::get('timelinelike/{datastring}','social\LikeController@postLike');
    Route::get('timelineUnlike/{datastring}','social\LikeController@postUnLike');
    Route::get('homelike/{datastring}','social\LikeController@postLike');
    Route::get('homeUnlike/{datastring}','social\LikeController@postUnLike');
    Route::get('guestlike/{datastring}','social\LikeController@postLike');
    Route::get('guestUnlike/{datastring}','social\LikeController@postUnLike');

    // Password reset routes...

    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
    Route::get('password/reset', function () {
        return view('auth.passwords.email');

    });
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

});








