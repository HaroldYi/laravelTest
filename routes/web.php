<?php

use Illuminate\Http\Response;

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

Route::get('hello/world/{name?}', function($name = null) {

    if($name != null) {
        return 'Hello World ' . $name;
    } else {
        return 'There\'s no argument. Url is \'hello/world/{name?}\'';
    }
});

Route::get('hello/world/{a}/{b}', function ($a, $b) {

    $members = array('소원', '예린', '은하', '유주', '신비', '엄지');
    $albums = array('EP 1집'=>'Season of Glass', 'EP 2집'=>'Flower Bud',
        'EP 3집'=>'Snowflake', '정규 1집'=>'LOL');

    $group_data = array('name'=>'여자친구');
    $group_data['members'] = $members;
    $group_data['albums'] = $albums;

// Print
    $output_data = json_encode($group_data, JSON_UNESCAPED_UNICODE);

    return response($output_data, 200)
        ->header('Content-Type', 'application/json')
        ->header('Cache-Control', 'max-age=' . 60*60 . ", must-revalidate");
});