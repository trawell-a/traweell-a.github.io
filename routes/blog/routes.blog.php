<?php

$router->group([
    'prefix' => '', 
    'namespace' => 'Blog',
], function($router) {
    $router->get('/new', [
        'as' => 'blog.new', 
        'uses' => 'BlogController@create'
    ]);
    $router->get('/{post_id}/edit', [
        'as' => 'blog.edit', 
        'uses' => 'BlogController@edit'
    ]);
    $router->get('/{post_id}/delete', [
        'as' => 'blog.delete', 
        'uses' => 'BlogController@delete'
    ]);
    $router->get('/{post_id}', [
        'as' => 'blog.show', 
        'uses' => 'BlogController@show'
    ]);
    $router->get('/', [
        'as' => 'blog.index',  
        'uses' => 'BlogController@index'
    ]);
});