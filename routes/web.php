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
    return view('home.index');
});


// Routes Authentication

Route::get("/register", function () {
    return view("auth.register");
});
Route::get("/login", function () {
    return view("auth.login");
});









// Routes Crud Sample

Route::get("/crud", function () { // contoh crud sample untuk halaman index
    return view("crud.index");
})->name("crud.index");

Route::get("/crud/create", function () { // contoh crud sample untuk halaman create
    return view("crud.create");
})->name("crud.create");

Route::get("/crud/edit", function () { // contoh crud sample untuk halaman edit
    return view("crud.edit");
})->name("crud.edit");

Route::get("/crud/show", function () { // contoh crud sample untuk halaman show
    return view("crud.show");
})->name("crud.show");
