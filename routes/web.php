<?php

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

$router->get('/', function () {
    return view('index');
});

$router->group(['prefix' => 'api', 'namespace' => 'API'], function () use ($router) {
    $router->get('/films', 'FilmController@index');
    $router->post('/films', 'FilmController@create');
    $router->get('/films/{id}', 'FilmController@read');
    $router->put('/films/{id}', 'FilmController@update');
    $router->delete('/films/{id}', 'FilmController@delete');
});
