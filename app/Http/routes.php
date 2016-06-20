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

    Route::get('home','social\SocialController@home');

    route::get('login', function () {
        return view('auth.login');
    });
    route::post('login', 'Auth\AuthController@postLogin');
    route::get('register', function () {
        return view('auth.register');
    });
    route::post('register', 'User\UserController@insert');
    Route::get('social/profile','User\UserController@index');

//    Route::post('social/new','User\UserController@update');
    Route::post('social/update','User\UserController@update');
    Route::post('social/newpost','social\SocialController@uploadPost');



    Route::get('logout', 'Auth\AuthController@logout');
    Route::get('social',function(){
       return view('social');
    });


    route::resource('social','social\SocialController');

   Route::post('social',['as'=> 'home','uses'=> 'social\SocialController@uploadPost']);
    Route::post('home',['as'=> 'home','uses'=> 'social\SocialController@uploadPost']);
    Route::get('social','social\SocialController@index');



    Route::post('comment',['as'=>'social','uses'=>'social\SocialController@postComment']);
    Route::post('homecomment',['as'=>'social','uses'=>'social\SocialController@homepostComment']);

    Route::post('/like','social\SocialController@like');


    Route::get('/social/profile/download',function(){

      $file= public_path(). "/profile/";
    $headers = array(
        'Content-Type'=>'profile/pdf',
    );
    return Response::download($file,'profile', $headers);
    });





    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');


// Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
    Route::get('password/reset', function () {
        return view('auth.passwords.email');

    });




});








