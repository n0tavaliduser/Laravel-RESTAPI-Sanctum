<?php

use App\Http\Controllers\MCategoryTaskController;
use Illuminate\Support\Facades\Route;

Route::controller(MCategoryTaskController::class)->group(function () {
  Route::get('/m_category_task', 'index')->name('m_category_task.index');
  Route::get('/m_category_task/create', 'create')->name('m_category_task.create');
  Route::post('/m_category_task', 'store')->name('m_category_task.store');
  Route::get('/m_category_task/{m_category_task}', 'show')->name('m_category_task.show');
  Route::get('/m_category_task/{m_category_task}/edit', 'edit')->name('m_category_task.edit');
  Route::patch('/m_category_task/{m_category_task}', 'update')->name('m_category_task.update');
  Route::delete('/m_category_task/{m_category_task}', 'destroy')->name('m_category_task.destroy');
});