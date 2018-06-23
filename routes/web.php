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

// routes homepage
Route::get('/', 'HomeController@homepage')->name('homepage');
Route::get('/category/{category_name}', 'CategoryController@viewPostForCategory')->name('posts_for_category');
Route::get('/post/{post_slug}', 'DetailPostController@viewPostForSlug')->name('post_for_slug');
Route::get('/admin/post/new', 'AdminController@adminView')->name('admin');
Route::post('/admin/post/new/add', 'AdminController@addPost')->name('add_post');
Route::get('/admin/post/edit/{post_slug}', 'AdminController@viewEditPost')->name('edit_post_page');
Route::post('/admin/post/new/update/{post_slug}', 'AdminController@updatePost')->name('update_post');
