<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function () {
    return view('welcome');
})->name('/');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/activity', function (){
    return view('content.activity');
})->name('activity');

Route::resource('/activity', 'ActivityController')->names([
    'index' => 'activity.index',
    'create' => 'activity.create',
    'update' => 'activity.update',
    'edit' => 'activity.edit',
    'destroy' => 'activity.destroy'
 ]);


Route::post('/activity/{id}/edit', [
    'uses' => 'ActivityController@update',
    'as' => 'activity.update'
]);

Route::get('/send_email', function (){
    return view('user.send_email');
})->name('send_email');

//Route::get('/login','LoginController@login')->name('login');


    Route::get('/profile',function (){

        return view('user.profile') ;


    })->name('user.profile');


//    Route::get('/profile', function () {
//    })->name('admin.profile')->middleware('is_admin');

//    Route::get('/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');



//Route::get('/login', 'auth\LoginController@login')->name('login');
//Route::get('/logout', 'LoginController@logout')->name('logout');

//ARTICLE
Route::resource('/articles', 'ArticleController')->names([
    'index' => 'articles.index',
    'create' => 'articles.create',
    'update' => 'articles.update',
    'edit' => 'articles.edit',
    'destroy' => 'articles.destroy'
]);

Route::post('/article/{id}/edit', [
    'uses' => 'ArticleController@update',
    'as' => 'article.update'
]);
//Route::get('/article/{id}/delete', [
//    'uses' => 'ArticleController@destroy',
//    'as' => 'article.delete'
//]);
//Route::post('/article/search', [
//    'uses' => 'ArticleController@search',
//    'as' => 'article.search'
//]);



Route::post('articles/{id}/comment/add', [
    'uses' => 'CommentsController@store',
    'as' => 'comment.store'
]);


// Route::group(['middleware' => 'is_admin'], function () {

    Route::resource('/profile', 'UsersController')->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'update' => 'users.update',
        'edit' => 'users.edit',
        'destroy' => 'users.destroy'
     ]);

     Route::patch('/profile/{user}', [
        'uses' => 'UsersController@update',
        'as' => 'users.update'
     ]);
// });

Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');
