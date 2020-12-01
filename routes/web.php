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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('livewire.livewire');
});

Route::get('allRoute', function () {
    return view('allRoute');
});
Route::get('user', function () {
    return view('blade.userRegistration');
});
// Route::livewire('allRoute', 'allRoute');

Route::get('nestingComponet', function () {
    return view('blade.nestingComponet');
});


Route::get('html', function () {
    return view('html.index');
});