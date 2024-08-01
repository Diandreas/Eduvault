<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\CourssController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoollevelController;
use App\Http\Controllers\SchoollevelscourController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('country', CountryController::class);
    Route::resource('school', SchoolController::class);
    Route::resource('schoollevel', SchoollevelController::class);
    Route::resource('schoollevelscours', SchoollevelscourController::class);
});





