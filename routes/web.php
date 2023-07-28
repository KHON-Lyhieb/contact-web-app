<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

Route::fallback(fn () => "<h1>Soory, the page your are looking for is not exist.</h1>");

Route::get('/', function () {
    if(auth()->check()) {
        return redirect()->route('contacts.index');
    }
    return view('welcome');

})->name('welcome');

Route::controller(ContactsController::class)
        ->prefix('contacts')
        ->name('contacts.')
        ->group(function () {
            Route::get('/', 'index') -> name('index');
            Route::get('/create', 'create') -> name('create');
            Route::get('/{id}', 'show') -> name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
