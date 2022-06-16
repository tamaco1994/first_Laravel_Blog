<?php

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

Route::get('/', function () {
    return view('welcome');
});

// ブログ一覧画面を表示
// Route:Routeファサード
// get HTTPメソッドの指定
// 'blogs' 任意のURL
// BlogController 作ったControllerを指定
// shoList Controllerのメソッド名を指定
Route::get('/', 'App\Http\Controllers\BlogController@showList')->name('blogs');

// ブログ登録画面を表示
Route::get('/blog/create', 'App\Http\Controllers\BlogController@showCreate')->name('create');

// ブログ登録
Route::post('/blog/store', 'App\Http\Controllers\BlogController@exeStore')->name('store');

// ブログ詳細画面を表示
Route::get('/blog/{id}', 'App\Http\Controllers\BlogController@showDetail')->name('show');

// ブログ編集画面を表示
Route::get('/blog/edit/{id}', 'App\Http\Controllers\BlogController@showEdit')->name('edit');
Route::post('/blog/update', 'App\Http\Controllers\BlogController@exeUpdate')->name('update');

// ブログ削除
Route::post('/blog/delete/{id}', 'App\Http\Controllers\BlogController@exeDelete')->name('delete');