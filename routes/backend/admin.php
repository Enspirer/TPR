<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\AgentRequestController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\FileManagerController;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('country', [CountryController::class, 'index'])->name('country.index');
Route::get('country/create', [CountryController::class, 'create'])->name('country.create');
Route::post('country/create', [CountryController::class, 'store'])->name('country.store');
Route::get('country/getdetails', [CountryController::class, 'getDetails'])->name('country.getDetails');
Route::get('country/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
Route::post('country/update', [CountryController::class, 'update'])->name('country.update');
Route::get('country/delete/{id}', [CountryController::class, 'destroy'])->name('country.destroy');

Route::get('property', [PropertyController::class, 'index'])->name('property.index');
Route::get('property/getdetails', [PropertyController::class, 'getDetails'])->name('property.getDetails');
Route::get('property/edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
Route::post('property/update', [PropertyController::class, 'update'])->name('property.update');
Route::get('property/delete/{id}', [PropertyController::class, 'destroy'])->name('property.destroy');

Route::get('property_type', [PropertyTypeController::class, 'index'])->name('property_type.index');
Route::get('property_type/create', [PropertyTypeController::class, 'create'])->name('property_type.create');
Route::post('property_type/create', [PropertyTypeController::class, 'store'])->name('property_type.store');
Route::get('property_type/getdetails', [PropertyTypeController::class, 'getDetails'])->name('property_type.getDetails');
Route::get('property_type/edit/{id}', [PropertyTypeController::class, 'edit'])->name('property_type.edit');
Route::post('property_type/update', [PropertyTypeController::class, 'update'])->name('property_type.update');
Route::get('property_type/delete/{id}', [PropertyTypeController::class, 'destroy'])->name('property_type.destroy');

Route::get('agent', [AgentRequestController::class, 'index'])->name('agent.index');
Route::get('agent/getdetails', [AgentRequestController::class, 'getDetails'])->name('agent.getDetails');
Route::get('agent/edit/{id}', [AgentRequestController::class, 'edit'])->name('agent.edit');
Route::post('agent/update', [AgentRequestController::class, 'update'])->name('agent.update');
Route::get('agent/delete/{id}', [AgentRequestController::class, 'destroy'])->name('agent.destroy');

Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
Route::get('settings/getdetails', [SettingsController::class, 'getDetails'])->name('settings.getDetails');
Route::get('settings/edit/{id}', [SettingsController::class, 'edit'])->name('settings.edit');
Route::post('settings/update', [SettingsController::class, 'update'])->name('settings.update');
Route::get('settings/delete/{id}', [SettingsController::class, 'destroy'])->name('settings.destroy');

Route::get('contact_us', [ContactUsController::class, 'index'])->name('contact_us.index');
Route::get('contact_us/getdetails', [ContactUsController::class, 'getDetails'])->name('contact_us.getDetails');
Route::get('contact_us/edit/{id}', [ContactUsController::class, 'edit'])->name('contact_us.edit');
Route::post('contact_us/update', [ContactUsController::class, 'update'])->name('contact_us.update');
Route::get('contact_us/delete/{id}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy');

Route::get('file_manager', [FileManagerController::class, 'index'])->name('file_manager.index');
Route::get('file_manager/getdetails', [FileManagerController::class, 'getDetails'])->name('file_manager.getDetails');
Route::get('file_manager/delete/{id}', [FileManagerController::class, 'destroy'])->name('file_manager.destroy');
