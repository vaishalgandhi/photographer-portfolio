<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Photographers
$router->get('photographers', 'PhotographerController@index');
$router->post('photographers', 'PhotographerController@store');
$router->get('photographers/{id}', 'PhotographerController@show');
$router->post('photographers/{id}', 'PhotographerController@update');
$router->delete('photographers/{id}', 'PhotographerController@destroy');

// Albums
$router->get('albums', 'AlbumController@index');
$router->post('albums', 'AlbumController@store');
$router->get('albums/{id}', 'AlbumController@show');
$router->post('albums/{id}', 'AlbumController@update');
$router->delete('albums/{id}', 'AlbumController@destroy');