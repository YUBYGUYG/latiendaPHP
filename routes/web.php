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

//primera ruta en laravel
Route::get('hola' , function(){
    echo"hola";
});

Route::get('arreglos', function(){
    $estudiantes =[ "ED" => "Edward",
                   "DA" => "Daniela",
                   "YU" =>"Yuliana"];
echo "<pre>";
    var_dump($estudiantes);
echo "<pre>"; 
echo "<hr />";
//agregar posición
$estudiantes["CR"] = "Cristian";
echo "<<pre>";
var_dump($estudiantes);
echo "<<pre>";
//retirar elementos de arreglo
echo "<hr />";
unset($estudiantes["DA"]);
echo "<pre>";
var_dump($estudiantes);
echo "<pre>";

});

Route::get('paises', function(){
    $paises = [
        "Colombia" => [
            "capital" => "Bogotá",
            "moneda" => "peso",
            "población" => 51.6,
            "ciudades" => [
                "Bogotá",
                "Medellín",
                "Cali"
            ]
        ],
        "Perú" => [
            "capital" => "Lima",
            "moneda" => "Sol",
            "población" => 32.97,
            "ciudades" => [
                "Cuzco",
                "Piura"
            ]
        ],
        "Paraguay" => [
            "capital" => "Asunción",
            "moneda" => "Guaraní",
            "población" => 7.1,
            "ciudades" => [
                "Ciudad del Este"
            ]
        ]
    ];

    //mostrar vista 
    return view('paises')
        ->with("paises", $paises); 

/*Foreach
foreach($paises as $pais => $infopais){
    echo "<h1> $pais </h1>";
    echo "capital".$infopais["capital"];
    echo "</br>";
    echo "moneda".$infopais["moneda"];
    echo "</br>";
    echo "poblacion".$infopais["poblacion"];
    echo "<hr />";
    foreach($infopais as $clave => $valor){
        echo "$clave : $valor<br/>"; 
    } 
}*/
});