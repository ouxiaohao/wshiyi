<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//访问后台
Auth::routes();
Route::get('admin', 'Admin\IndexController@index');


//搜索
Route::post('search','Home\IndexController@search');
//访问首页
Route::get('/{param?}', 'Home\IndexController@index');

Route::get('cate/{cate_id?}', 'Home\IndexController@cate');
Route::get('tag/{tag_id?}', 'Home\IndexController@tag');


/**
 * 前端
 **/
//侧边栏
Route::get('home/sidebar', 'Home\IndexController@sidebar');
Route::get('home/cate_list', 'Home\IndexController@cate_list');
Route::get('home/article/index/{id}', 'Home\ArticleController@index');


//后台文章
Route::get('article/index', 'Admin\ArticleController@index');
Route::get('article/add', 'Admin\ArticleController@add');
Route::get('article/edit/{id}', 'Admin\ArticleController@edit');
Route::get('article/del/{id}', 'Admin\ArticleController@del');
Route::post('article/add_data', 'Admin\ArticleController@addData');
Route::post('article/edit_data/{id}', 'Admin\ArticleController@editData');
Route::post('md/upload_image', 'Admin\ArticleController@upload_image');
//Route::any('article/upload_image', 'Admin\ArticleController@upload_image');
//分类
Route::get('category/index', 'Admin\CategoryController@index');
Route::match(['get','post'],'category/add', 'Admin\CategoryController@add');
Route::match(['get','post'],'category/edit/{id}', 'Admin\CategoryController@edit');
Route::get('category/del/{id}', 'Admin\CategoryController@del');

//标签
Route::get('tag/index', 'Admin\TagController@index');
Route::any('tag/add', 'Admin\TagController@add');
Route::any('tag/edit/{id}', 'Admin\TagController@edit');
Route::get('tag/del/{id}', 'Admin\TagController@del');

//评论
Route::post('api/comment/add_comment', 'Api\CommentController@add_comment');
Route::get('api/comment/comment_list', 'Api\CommentController@comment_list');
Route::get('api/comment/del_comment', 'Api\CommentController@del_comment');

