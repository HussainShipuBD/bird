<?php
// use App\Http\Middleware\AdminCheck;
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

Route::get('/', 'UserController@index');

Route::get('app/get_bird', 'UserController@getBird');
Route::get('/app/get_bird_details/{key}','UserController@getBirdDetails');

Route::any('{slug}', 'UserController@home')->where('slug', '([A-z\d\-\/_.]+)?');



