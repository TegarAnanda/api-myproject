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
$api = app('Dingo\Api\Routing\Router');

Route::get('/', function () {
    return view('welcome');
});

$api->version('v1', function ($api){
    $api->get('test', function (){
        return "Test";
    });

    /**
     * Threads
     */
    $api->post('thread/store', [
        'as' => 'thread.store',
        'uses' => 'App\Http\Controllers\CThreads@store'
    ]);

    $api->post('thread/update/{id}', [
        'as' => 'thread.update',
        'uses' => 'App\Http\Controllers\CThreads@update'
    ]);

    $api->get('thread/delete/{id}', [
        'as' => 'thread.delete',
        'uses' => 'App\Http\Controllers\CThreads@delete'
    ]);

    $api->get('thread/show', [
        'as' => 'thread.show',
        'uses' => 'App\Http\Controllers\CThreads@showAll'
    ]);

    $api->get('thread/show/{id}', [
        'as' => 'thread.show.id',
        'uses' => 'App\Http\Controllers\CThreads@show'
    ]);

    $api->get('thread/relatedByCategory/{cat}', [
        'as' => 'thread.relatedByCategory',
        'uses' => 'App\Http\Controllers\CThreads@relatedByCategory'
    ]);

    /**
     * Category
     */
    $api->post('category/store', [
        'as' => 'category.store',
        'uses' => 'App\Http\Controllers\CCategories@store'
    ]);

    $api->get('category/delete/{id}', [
        'as' => 'category.delete',
        'uses' => 'App\Http\Controllers\CCategories@delete'
    ]);

    $api->get('category/show/{id}', [
        'as' => 'category.show.id',
        'uses' => 'App\Http\Controllers\CCategories@show'
    ]);

    $api->get('category/show', [
        'as' => 'category.show',
        'uses' => 'App\Http\Controllers\CCategories@showAll'
    ]);
});
