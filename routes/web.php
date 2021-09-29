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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('workExperiences',\App\Http\Controllers\WorkExperienceController::class);
    Route::resource('skills',\App\Http\Controllers\SkillController::class);
    Route::resource('educations',\App\Http\Controllers\EducationController::class);
    Route::get('profile',[\App\Http\Controllers\UserController::class,'profile'])->name('profile');
});
