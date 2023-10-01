<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::controller(TaskController::class)->group(function () {
  Route::get('/task', 'index')->name('task.index');
  Route::get('/task/create', 'create')->name('task.create');
  Route::post('/task', 'store')->name('task.store');
  Route::get('/task/{task}', 'show')->name('task.show');
  Route::get('/task/{task}/edit', 'edit')->name('task.edit');
  Route::patch('/task/{task}', 'update')->name('task.update');
  Route::delete('/task/{task}', 'destroy')->name('task.destroy');
});