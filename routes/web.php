<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::controller(FormController::class)->group(function () {
    Route::get('/', 'showForm')->name('form.show');
    Route::post('/submit', 'submitForm')->name('form.submit');
});
