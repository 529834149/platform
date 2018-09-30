<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('member','MemberController');//会员管理
    $router->resource('categories','CategoriesController');//分类管理
    $router->resource('article','ArticlesController');//文章管理
    $router->resource('post','PostController');//文章管理
    $router->resource('link','LinkController');//友情链接管理
    $router->resource('advertising ','AdvertisingController');//广告位管理
    $router->post('uploads ','ArticlesController@uploads');//广告位管理
//    $router->get('tags_info ','ArticlesController@tags_info');//分页加载下拉菜单
});
