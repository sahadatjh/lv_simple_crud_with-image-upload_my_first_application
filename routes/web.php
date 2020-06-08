<?php

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

// Route::get('/', function () {
// 	return view('pages.index');
// });
Route::get('/', 'PageController@index');

Route::get('about/us','PageController@AboutPage')->name('about');
Route::get('contuct/us','PageController@ContuctPage')->name('contuct');



Route::get('add/catagory','PageController@addcatagory')->name('add.catagory');
Route::post('store/catagory','PageController@storecatagory')->name('store.catagory');
Route::get('all/catagory','PageController@allcatagory')->name('all.catagory');
Route::get('view/catagory/{id}','PageController@viewcatagory');
Route::get('delete/catagory/{id}','PageController@deletecatagory');
Route::get('edit/catagory/{id}','PageController@EditCatagory');
Route::post('update/catagory/{id}','PageController@UpdateCatagory');

//post crud are here.......
Route::get('write/post','PageController@writePost')->name('write.post');
Route::post('store/post','PostController@StorePost')->name('store.post');
Route::get('all/posts','PostController@AllPosts')->name('all.post');
Route::get('delete/post/{id}','PostController@DeletePost');
Route::get('edit/post/{id}','PostController@EditPost');
Route::get('view/post/{id}','PostController@ViewPost');
Route::post('update/post/{id}','PostController@UpdatePost');


