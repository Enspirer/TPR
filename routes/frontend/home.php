<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FindAgentController;
use App\Http\Controllers\Frontend\IndividualAgentController;
use App\Http\Controllers\Frontend\MapSearchController;
use App\Http\Controllers\Frontend\ResidentialController;
use App\Http\Controllers\Frontend\IndividualPropertyController;
use App\Http\Controllers\Frontend\CommercialController;

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\AgentController;
use App\Http\Controllers\Frontend\User\CompanyController;
use App\Http\Controllers\Frontend\User\ResultsController;
use App\Http\Controllers\Frontend\User\PreferencesController;
use App\Http\Controllers\Frontend\User\CountryManagementController;
use App\Http\Controllers\Frontend\FileManagerController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('country/{country_id}', [HomeController::class, 'index'])->name('home_page');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/insert', [ContactController::class, 'store'])->name('contact.store');

Route::get('find-agent/{area}/{agent_type}/{agent_name}', [FindAgentController::class, 'index'])->name('find-agent');
Route::post('find-agent/store', [FindAgentController::class, 'store'])->name('find-agent.store');

Route::get('individual-agent/{id}', [IndividualAgentController::class, 'index'])->name('individual-agent');
// Route::get('individual-agent', [IndividualAgentController::class, 'index'])->name('individual-agent');
Route::get('map-search', [MapSearchController::class, 'index'])->name('map-search');
// Route::get('residential', [ResidentialController::class, 'index'])->name('residential');

Route::get('individual-property/{id}', [IndividualPropertyController::class, 'index'])->name('individual-property');
Route::post('prop_favourite',[IndividualPropertyController::class,'propertyFavourite'])->name('propertyFavourite');
Route::post('prop_favourite/unsave/{id}',[IndividualPropertyController::class,'propertyFavouriteDelete'])->name('propertyFavouriteDelete');

Route::get('commercial', [CommercialController::class, 'index'])->name('commercial');
// Route::get('individual-property/{id}', [IndividualPropertyController::class, 'property_details'])->name('individual-property.property_details');


Route::get('image_assest/{id}',[HomeController::class,'image_assets'])->name('image_assets');


Route::post('file_manager-store',[FileManagerController::class,'store'])->name('file_store');

Route::post('search_result',[HomeController::class,'get_search_result'])->name('search_result_function');

Route::post('agent', [IndividualPropertyController::class, 'contact_agent'])->name('invidual_property');


Route::get('search_result_filter/{key_name}/{min_price}/{max_price}/{category_type}/{transaction_type}/{property_type}/{listed_since}/{building_type}/{beds}/{baths}/{land_size}/{open_house}/{zoning_type}/{units}/{building_size}/{farm_type}/{parking_type}',[HomeController::class,'search_function'])->name('search_function');


Route::post('favourite/property', [HomeController::class, 'favouriteHeart'])->name('favourite_heart');

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






        Route::get('property_detail',[FileManagerController::class,'get_files'])->name('getFileDetails');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('dashboard/user/store', [DashboardController::class, 'store'])->name('dashboard.userStore');
        Route::post('dashboard/agent/update', [AgentController::class, 'update_agent'])->name('dashboard.update_agent');


        Route::get('communications', [DashboardController::class, 'communications'])->name('communications');

        Route::get('account-dashboard', [DashboardController::class, 'accountDashboard'])->name('account-dashboard');

        Route::get('favourites', [DashboardController::class, 'favourites'])->name('favourites');

        Route::get('my-bookings', [DashboardController::class, 'myBookings'])->name('my-bookings');


        Route::get('agent', [AgentController::class, 'index'])->name('agent');

        Route::post('agent/store', [AgentController::class, 'store'])->name('agent.store');

        Route::get('agent/edit', [AgentController::class, 'agent_edit'])->name('agent.edit');

        Route::post('agent/update', [AgentController::class, 'update_agent'])->name('agent.update_agent');

        Route::get('agent-bookings', [AgentController::class, 'agentBookings'])->name('agent-bookings');

        Route::post('agent-bookings/respond', [AgentController::class, 'agentBookingsRespond'])->name('agent-bookings-respond');


        Route::get('properties', [AgentController::class, 'properties'])->name('properties');

        Route::get('booking', [AgentController::class, 'bookingBox'])->name('booking');

        Route::get('company', [AgentController::class, 'company'])->name('company');

        Route::get('results', [ResultsController::class, 'index'])->name('results');

        Route::get('preferences', [PreferencesController::class, 'index'])->name('preferences');


        Route::get('properties/create', [AgentController::class, 'createProperty'])->name('create-property');

        Route::post('properties/store', [AgentController::class, 'createPropertyStore'])->name('create-property.createPropertyStore');

        Route::get('properties/edit/{id}', [AgentController::class, 'editProperty'])->name('property-edit');

        Route::post('properties/edit', [AgentController::class, 'updateProperty'])->name('property-update');

        Route::get('properties/delete/{id}', [AgentController::class, 'deleteProperty'])->name('property-delete');


        Route::get('booking/user-chat', [AgentController::class, 'userChat'])->name('user-chat');

        Route::get('company/property', [AgentController::class, 'companyProperty'])->name('company-property');

        Route::get('country-managment-dashboard', [CountryManagementController::class, 'index'])->name('country-management');

        Route::get('country-management/property-approval', [CountryManagementController::class, 'propertyApproval'])->name('property-approval');

        Route::get('country-management/single-property-approval/{id}', [CountryManagementController::class, 'singlePropertyApproval'])->name('single-property-approval');

        Route::post('country-management/single-property-approval/update', [CountryManagementController::class, 'singlePropertyApproved'])->name('single-property-approved');

        Route::get('country-management/supports', [CountryManagementController::class, 'supports'])->name('supports');


        Route::get('country-management/agent-approval', [CountryManagementController::class, 'agentApproval'])->name('agent-approval');
        
        Route::get('country-management/agent-approval-delete/{id}', [CountryManagementController::class, 'agentApprovalDelete'])->name('agentApprovalDelete');

        Route::get('country-management/single-agent-approval/{id}', [CountryManagementController::class, 'singleAgentApproval'])->name('single-agent-approval');

        Route::post('country-management/single-agent-approval/update', [CountryManagementController::class, 'singleAgentApprovalUpdate'])->name('singleAgentApprovalUpdate');

        Route::get('country-management/individual-help', [CountryManagementController::class, 'individualHelp'])->name('individual-help');

        Route::get('country-management/sidebar-ad', [CountryManagementController::class, 'sidebarAD'])->name('sidebar_ad');
        Route::post('sidebar-ad/store', [CountryManagementController::class, 'sidebarAD_store'])->name('sidebar_ad.sidebarAD_store');
        Route::post('sidebar-ad/update', [CountryManagementController::class, 'sidebarAD_update'])->name('sidebar_ad.sidebarAD_update');
        Route::get('sidebar-ad/delete/{id}', [CountryManagementController::class, 'sidebarAD_delete'])->name('sidebar_ad.sidebarAD_delete');


        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
