<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//RUTA PAISES 
Route::get('paises' , function(){
    $paises=[
        "Colombia" => [
            'capital' => 'Bogotá',
            'moneda' => 'Peso',
            'poblacion' => 51.6,
            'ciudades' => [
                'Medellin',
                'Pereira',
                'Barranquilla',
                'cali'
            ]
        ], 
        "Perú" => [
            'capital' => 'Lima',
            'moneda' => 'Sol',
            'poblacion' => 32.9,
            'ciudades' => [
                'Cusco',
                'Arequipa',
                'Chiclayo'
            ]
        ],
        "Paraguay" => [
            'capital' => 'Asuncion',
            'moneda' => 'Guarani Paraguayo',
            'poblacion' => 7.1,
            'ciudades' => [
                'Ciudad del Este',
                'Luque'
    
            ]
        ]
    ];
/*
    echo "<pre>";
    var_dump($paises);
    echo "</pre>";
*/


    //mostar la vista de paises
    return view('paises')
            ->with('paises', $paises);

});
