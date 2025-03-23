<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour le profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard Créateur d'événements
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/createur/dashboard', function () {
        return view('createur.dashboard');
    })->name('createur.dashboard');

    // Routes CRUD pour les événements
    Route::resource('events', EventController::class);

    Route::get('/createur/events', [EventController::class, 'index'])->name('createur.index');
    Route::get('/createur/events/create', [EventController::class, 'create'])->name('createur.create');
    Route::post('/createur/events', [EventController::class, 'store'])->name('createur.store');
    Route::get('/createur/events/{event}/edit', [EventController::class, 'edit'])->name('createur.edit');
    Route::put('/createur/events/{event}', [EventController::class, 'update'])->name('createur.update');
    Route::delete('/createur/events/{event}', [EventController::class, 'destroy'])->name('createur.destroy');

    // Routes supplémentaires pour les participants
    Route::post('/events/{id}/participate', [EventController::class, 'participate'])->name('events.participate');
    Route::post('/events/{id}/unparticipate', [EventController::class, 'unparticipate'])->name('events.unparticipate');
});

// Dashboard Participant
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/participant/dashboard', function () {
        return view('participant.dashboard');
    })->name('participant.dashboard');
});

Route::get('/participant/events', [EventController::class, 'showEventsForParticipants'])->name('participant.events');

Route::get('/generate-report', [ReportController::class, 'generateReport']);
require __DIR__.'/auth.php';
