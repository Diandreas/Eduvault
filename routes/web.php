<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ChronoController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;


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

    Route::get('/home', [DocumentController::class, 'home'])->name('home');
    Route::get('/documents/search', [DocumentController::class, 'search'])->name('documents.search');

// Routes pour CountryController
    Route::resource('country', CountryController::class);

// Routes pour SchoolController
    Route::resource('school', SchoolController::class);

// Routes pour ProfessionController

    Route::resource('professions', ProfessionController::class);

// Routes pour UserController
    Route::resource('users', UserController::class);


// Routes pour CourseController
    Route::resource('courses', CourseController::class);

// Routes pour GradeController
    Route::resource('grades', GradeController::class);

// Routes pour PeriodController
    Route::resource('periods', PeriodController::class);

// Routes pour DocumentController
    Route::resource('documents', DocumentController::class);

// Routes pour ChronoController
    Route::resource('chronos', ChronoController::class);

//import de Benoit

    Route::post('/import', [ImportController::class, 'import'])->name('import');

//importer pour periods

    Route::post('/importPeriod', [ImportController::class, 'importPeriod'])->name('importPeriod');

    Route::post('/importGrades', [ImportController::class, 'importGrade'])->name('importGrades');

    Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
});





