<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SAMLController;
use Slides\Saml2\Http\Controllers\Saml2Controller;

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

Route::post('saml2/{uuid}/acs', [Saml2Controller::class, 'acs'])->name('acs');
Route::get('saml2/{uuid}/login', [Saml2Controller::class, 'login'])->name('login');

Auth::routes();


Route::middleware(['saml'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

