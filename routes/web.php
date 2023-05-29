<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::group(['prefix' => 'basket',],function(){

    Route::post('/add/{id}', [App\Http\Controllers\BasketController::class, 'basketAdd'])->name('basket-add');
    Route::get('/', [App\Http\Controllers\BasketController::class, 'basket'])->name('basket');
    Route::get('/place', [App\Http\Controllers\BasketController::class, 'basketPlace'])->name('basket-place');
    Route::post('/remove/{id}', [App\Http\Controllers\BasketController::class, 'basketRemove'])->name('basket-remove');
    Route::post('/place', [App\Http\Controllers\BasketController::class, 'basketConfirm'])->name('basket-confirm');

});

Route::get('/How_to_order', function () {return view('how_to_order');
});

Route::get('/aboutus', function () {return view('aboutus');
});

Route::get('/ContactUs', function () {return view('ContactUs');
});

Route::post('/ContactUs', [App\Http\Controllers\MessageController::class, 'msgConfirm'])->name('msg-confirm');

Route::get('/contacts', function () {return view('contacts');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{cat}', [App\Http\Controllers\ProductController::class, 'showCategory'])->name('showCategory');

Route::get('/{cat}/{product_id}', [App\Http\Controllers\ProductController::class, 'show'])->name('showProduct');


