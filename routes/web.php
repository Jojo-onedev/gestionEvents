<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard Créateur d'événements
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/createur/dashboard', function () {
        return view('createur.dashboard'); // Vue pour le créateur
    })->name('createur.dashboard');

    Route::resource('events', EventController::class)->middleware('auth');
});

// Dashboard Participant
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/participant/dashboard', function () {
        return view('participant.dashboard'); // Vue pour le participant
    })->name('participant.dashboard');
});

// Inscription à un événement ou désinscription d'un événement pour les participants
Route::post('/events/{id}/participate', [EventController::class, 'participate'])->name('events.participate');
Route::post('/events/{id}/unparticipate', [EventController::class, 'unparticipate'])->name('events.unparticipate');


Route::middleware(['auth'])->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
});

// Protéger ces routes pour les créateurs d'événements
Route::middleware(['auth'])->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

require __DIR__.'/auth.php';
