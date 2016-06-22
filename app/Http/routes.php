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

use Illuminate\Http\Response;

Route::get('/', function () {
    return view('auth.login');
});
//Route::get('index',function(){
//    return view('index');
//});




//Route::get('entry',function(){
//   return view('admin.entry');
//});
//Route::post('admin/entry','Admin\ArticleController@AddArticle');
//
//Route::get('about',function(){
//   return view('common.about');
//});
//
//route::get('/edit/{id}','Admin\ArticleController@EditArticle');
//
//
//route::post('update','Admin\ArticleController@UpdateArticle');
//route::get('/delete/{id}','Admin\ArticleController@DeleteArticle');
//
//route::resource('list','Admin\ArticleController');
//route::get('profile',function(){
//    return view('commom/profile');
//});
//
//route::get('show',function(){
//   return view('admin.list');
//});
Route::group(['middleware' => 'web'], function () {



    Route::auth();

//  Login/Logout/register

    route::get('login', function () {
        return view('auth.login');
    });
    route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@logout');
    route::get('register', function () {
        return view('auth.register');
    });
    route::post('register', 'User\UserController@insert');




    //Profile
    Route::get('/social/profile','User\UserController@index');
    Route::get('/social/guestuser/{id}','User\UserController@guestprofile');
    Route::post('/social/newprofile','User\UserController@update');
    Route::post('/social/{id}',['as'=> 'timeline','uses'=> 'social\SocialController@index']);

    Route::get('/social/{id}','social\SocialController@index');
    Route::get('/timeline','social\SocialController@timeline');

//    Route::get('social/aa',function(){
//    });

    //Post
    route::resource('social','social\SocialController');
    Route::get('/social/edit/{id}','social\SocialController@editPost');
    Route::post('/social/update','social\SocialController@updatePost');
    Route::get('/social/delete/{id}','social\SocialController@deletePost');
    Route::post('/timeline',['as'=> 'timeline','uses'=> 'social\SocialController@uploadPost']);
    Route::post('home',['as'=> 'home','uses'=> 'social\SocialController@uploadPosthome']);
    Route::get('home','social\SocialController@home');




    //Comment
    Route::post('comment',['as'=>'social','uses'=>'social\SocialController@postComment']);

    Route::post('homecomment',['as'=>'social','uses'=>'social\SocialController@homepostComment']);

   // Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
    Route::get('password/reset', function () {
        return view('auth.passwords.email');

    });
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

});








