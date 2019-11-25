<?php


Route::get('/', function () {
    return view('plantilla');
});
Route::resource("/alumnos","AlumnosController");
//Route::get('/alumnos', function () {
    //return view('alumnos');
//});
Route::get('/hi', function () {
    return ('<h1>hola mundo</h1>');
});
Route::resource("/carrera","controladorCarrerras");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
