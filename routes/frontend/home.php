<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FindAgentController;
use App\Http\Controllers\Frontend\IndividualAgentController;
use App\Http\Controllers\Frontend\MapSearchController;
use App\Http\Controllers\Frontend\ResidentialController;
use App\Http\Controllers\Frontend\IndividualPropertyController;

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\AgentController;
use App\Http\Controllers\Frontend\User\CompanyController;
use App\Http\Controllers\Frontend\User\ResultsController;
use App\Http\Controllers\Frontend\User\PreferencesController;


/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('country/{country_id}', [HomeController::class, 'index'])->name('home_page');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('find-agent', [FindAgentController::class, 'index'])->name('find-agent');
Route::get('individual-agent', [IndividualAgentController::class, 'index'])->name('individual-agent');
Route::get('map-search', [MapSearchController::class, 'index'])->name('map-search');
Route::get('residential', [ResidentialController::class, 'index'])->name('residential');
Route::get('individual-property', [IndividualPropertyController::class, 'index'])->name('individual-property');



//Route::get('contact', [ContactController::class, 'index'])->name('contact');
//Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('communications', [DashboardController::class, 'communications'])->name('communications');

        Route::get('account-dashboard', [DashboardController::class, 'accountDashboard'])->name('account-dashboard');

        Route::get('favourites', [DashboardController::class, 'favourites'])->name('favourites');

        Route::get('agent', [AgentController::class, 'index'])->name('agent');

        Route::get('properties', [AgentController::class, 'properties'])->name('properties');

        Route::get('booking', [AgentController::class, 'bookingBox'])->name('booking');

        Route::get('company', [AgentController::class, 'company'])->name('company');

        Route::get('results', [ResultsController::class, 'index'])->name('results');

        Route::get('preferences', [PreferencesController::class, 'index'])->name('preferences');


        Route::get('properties/create', [AgentController::class, 'createProperty'])->name('create-property');

        Route::get('booking/user-chat', [AgentController::class, 'userChat'])->name('user-chat');

        Route::get('company/property', [AgentController::class, 'companyProperty'])->name('company-property');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
