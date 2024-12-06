<?php

use App\Mediator\Http\Controllers\PermohonanLabController;
use App\Mediator\Http\Controllers\TerdugaTBController;
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
//     return view('pages.main');
// });

Route::resource('terduga-tb', TerdugaTBController::class);
Route::resource('permohonan-lab', PermohonanLabController::class);

Route::name('js.')->group(function() {
    Route::get('dynamic.js', 'JsController@dynamic')->name('dynamic');
});
