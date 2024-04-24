<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NarasumberController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Rute untuk login, register, dan logout
Route::middleware('guest')->group(function () {
    Route::get('/home', [LandingPageController::class, 'index'])->name('home');
    Route::get('/event/{id}', [LandingPageController::class, 'detail'])->name('eventLp');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.login');
    Route::get('/registrasi', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/registrasi', [AuthController::class, 'store'])->name('auth.store');
});

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::middleware('auth')->group(function () {
    // Tempatkan rute yang membutuhkan autentikasi di sini
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/event', [EventController::class, 'index'])->name('event');
    Route::get('/event/detail/{id}', [EventController::class, 'show'])->name('event.detail');
    Route::post('/event/create', [EventController::class, 'store'])->name('event.store');
    Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.delete');

    Route::get('/narasumber', [NarasumberController::class, 'index'])->name('narasumber');
    Route::post('/speaker/create', [NarasumberController::class, 'storeSpeaker'])->name('speaker.create');
    Route::put('/speaker/{id}', [NarasumberController::class, 'updateSpeaker'])->name('speaker.update');
    Route::delete('/speaker/{id}', [NarasumberController::class, 'destroySpeaker'])->name('speaker.delete');

    Route::post('/moderator/create', [NarasumberController::class, 'storeModerator'])->name('moderator.create');
    Route::put('/moderator/{id}', [NarasumberController::class, 'updateModerator'])->name('moderator.update');
    Route::delete('/moderator/{id}', [NarasumberController::class, 'destroyModerator'])->name('moderator.delete');

    Route::get('/participant', [ParticipantController::class, 'index'])->name('participant');
    Route::put('/participant/{id}', [ParticipantController::class, 'update'])->name('participant.update');

    Route::get('/payment', [PaymentController::class, 'index']);
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

});