<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\AgentRequestController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\FileManagerController;
use App\Http\Controllers\Backend\GlobalAdvertisementController;
use App\Http\Controllers\Backend\AdCategoryController;
use App\Http\Controllers\Backend\HomePageAdvertisementController;



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

Route::get('global_advertisement', [GlobalAdvertisementController::class, 'index'])->name('global_advertisement.index');
Route::get('global_advertisement/create', [GlobalAdvertisementController::class, 'create'])->name('global_advertisement.create');
Route::post('global_advertisement/store', [GlobalAdvertisementController::class, 'store'])->name('global_advertisement.store');
Route::get('global_advertisement/getdetails', [GlobalAdvertisementController::class, 'getDetails'])->name('global_advertisement.getDetails');
Route::get('global_advertisement/edit/{id}', [GlobalAdvertisementController::class, 'edit'])->name('global_advertisement.edit');
Route::post('global_advertisement/update', [GlobalAdvertisementController::class, 'update'])->name('global_advertisement.update');
Route::get('global_advertisement/destroy/{id}', [GlobalAdvertisementController::class, 'destroy'])->name('global_advertisement.destroy');
Route::get('global_advertisement/clear1/{id}', [GlobalAdvertisementController::class, 'clear1'])->name('global_advertisement.clear1');
Route::get('global_advertisement/clear2/{id}', [GlobalAdvertisementController::class, 'clear2'])->name('global_advertisement.clear2');
Route::get('global_advertisement/clear3/{id}', [GlobalAdvertisementController::class, 'clear3'])->name('global_advertisement.clear3');
Route::get('global_advertisement/clear4/{id}', [GlobalAdvertisementController::class, 'clear4'])->name('global_advertisement.clear4');
Route::get('global_advertisement/clear5/{id}', [GlobalAdvertisementController::class, 'clear5'])->name('global_advertisement.clear5');


Route::get('ad_category', [AdCategoryController::class, 'index'])->name('ad_category.index');
Route::get('ad_category/getdetails', [AdCategoryController::class, 'getDetails'])->name('ad_category.getDetails');
Route::get('ad_category/edit/{id}', [AdCategoryController::class, 'edit'])->name('ad_category.edit');
Route::post('ad_category/update', [AdCategoryController::class, 'update'])->name('ad_category.update');
Route::get('ad_category/delete/{id}', [AdCategoryController::class, 'destroy'])->name('ad_category.destroy');

Route::get('homepage_advertisement', [HomePageAdvertisementController::class, 'index'])->name('homepage_advertisement.index');
Route::get('homepage_advertisement/getdetails', [HomePageAdvertisementController::class, 'getDetails'])->name('homepage_advertisement.getDetails');
Route::get('homepage_advertisement/edit/{id}', [HomePageAdvertisementController::class, 'edit'])->name('homepage_advertisement.edit');
Route::post('homepage_advertisement/update', [HomePageAdvertisementController::class, 'update'])->name('homepage_advertisement.update');
Route::get('homepage_advertisement/destroy/{id}', [HomePageAdvertisementController::class, 'destroy'])->name('homepage_advertisement.destroy');
