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
    $array = [
        [
            'slot1' => 2,
            'slot2'=> 3
        ]
    ];
    echo $array[0]['slot1'];
    // return view('welcome');
});
