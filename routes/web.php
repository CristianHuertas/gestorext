<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\EmpleadoController;

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

//middleware
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/empleados', 'EmpleadoController@index');
});


// $router->get('/empleados', 'EmpleadoController@index');
// $router->post('/empleados/consulta', 'EmpleadoController@show');

$router->group(['prefix' => 'empleados'], function () use ($router) {
    // $router->get('/', 'EmpleadoController@index');
    // $router->get('/', [ 'as' => 'empleados.index', 'uses' => 'EmpleadoController@index']);

    // $router->post('/consulta', 'EmpleadoController@show');
});

$router->group(['prefix' => 'usuarios'], function () use ($router) {
    // $router->post('/store', 'UserController@store');
    $router->get('/', [ 'as' => 'usuarios.index', 'uses' => 'UserController@index']);
    $router->post('/store', [ 'as' => 'usuarios.store', 'uses' => 'UserController@store']);

    // $router->post('/consulta', 'EmpleadoController@show');
});

$router->group(['prefix' => 'login'], function () use ($router) {
    // $router->post('/', 'LoginController@login');
    $router->post('/', [ 'as' => 'Login', 'uses' => 'LoginController@login']);

});



