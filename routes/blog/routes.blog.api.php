<?php
$router->group([
    'prefix' => 'api/blog',
    'namespace' => 'Blog\Api'
], function($router) {
        $router->post('/', [
        'as' => 'blog.api.create',
        'uses' => 'BlogController@create'
    ]);
        $router->put('/{post_id}', [
        'as' => 'blog.api.update',
        'uses' => 'BlogController@update'
    ]);
        $router->delete('/{post_id}', [
        'as' => 'blog.api.delete',
        'uses' => 'BlogController@delete'
    ]);
        $router->get('/', [
        'as' => 'blog.api.index',
        'uses' => 'BlogController@index'
    ]);
        $router->get('/{post_id}', [
        'as' => 'blog.api.show',
        'uses' => 'BlogController@show'
    ]);
});
