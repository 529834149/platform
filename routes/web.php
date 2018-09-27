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

Route::resource('/','IndexController');//首页
Route::resource('member','MemberController');//会员管理
Route::resource('category','CategoryController');//分类管理
Route::resource('article','ArticlesController');//文章管理
Route::resource('link','LinkController');//友情链接管理

