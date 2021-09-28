<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/ru');

Route::redirect('/backend', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Qand A
    Route::delete('qand-as/destroy', 'QandAController@massDestroy')->name('qand-as.massDestroy');
    Route::resource('qand-as', 'QandAController');

    // Cooperation
    Route::delete('cooperations/destroy', 'CooperationController@massDestroy')->name('cooperations.massDestroy');
    Route::resource('cooperations', 'CooperationController', ['except' => ['create', 'store', 'edit', 'update']]);

    // Country
    Route::delete('countries/destroy', 'CountryController@massDestroy')->name('countries.massDestroy');
    Route::post('countries/media', 'CountryController@storeMedia')->name('countries.storeMedia');
    Route::post('countries/ckmedia', 'CountryController@storeCKEditorImages')->name('countries.storeCKEditorImages');
    Route::resource('countries', 'CountryController');

    // Programm
    Route::delete('programms/destroy', 'ProgrammController@massDestroy')->name('programms.massDestroy');
    Route::resource('programms', 'ProgrammController');

    // Direction
    Route::delete('directions/destroy', 'DirectionController@massDestroy')->name('directions.massDestroy');
    Route::resource('directions', 'DirectionController');

    // University
    Route::delete('universities/destroy', 'UniversityController@massDestroy')->name('universities.massDestroy');
    Route::post('universities/media', 'UniversityController@storeMedia')->name('universities.storeMedia');
    Route::post('universities/ckmedia', 'UniversityController@storeCKEditorImages')->name('universities.storeCKEditorImages');
    Route::resource('universities', 'UniversityController');

    // Gallery
    Route::delete('galleries/destroy', 'GalleryController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleryController@storeMedia')->name('galleries.storeMedia');
    Route::post('galleries/ckmedia', 'GalleryController@storeCKEditorImages')->name('galleries.storeCKEditorImages');
    Route::resource('galleries', 'GalleryController');

    // Testimonial
    Route::delete('testimonials/destroy', 'TestimonialController@massDestroy')->name('testimonials.massDestroy');
    Route::post('testimonials/media', 'TestimonialController@storeMedia')->name('testimonials.storeMedia');
    Route::post('testimonials/ckmedia', 'TestimonialController@storeCKEditorImages')->name('testimonials.storeCKEditorImages');
    Route::resource('testimonials', 'TestimonialController');

    // Document
    Route::delete('documents/destroy', 'DocumentController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');
    Route::post('documents/ckmedia', 'DocumentController@storeCKEditorImages')->name('documents.storeCKEditorImages');
    Route::resource('documents', 'DocumentController', ['except' => ['create', 'store', 'edit', 'update']]);

    // Header
    Route::resource('headers', 'HeaderController', ['except' => ['create', 'store', 'destroy']]);

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // About
    Route::delete('abouts/destroy', 'AboutController@massDestroy')->name('abouts.massDestroy');
    Route::post('abouts/media', 'AboutController@storeMedia')->name('abouts.storeMedia');
    Route::post('abouts/ckmedia', 'AboutController@storeCKEditorImages')->name('abouts.storeCKEditorImages');
    Route::resource('abouts', 'AboutController');

    // News
    Route::delete('news/destroy', 'NewsController@massDestroy')->name('news.massDestroy');
    Route::post('news/media', 'NewsController@storeMedia')->name('news.storeMedia');
    Route::post('news/ckmedia', 'NewsController@storeCKEditorImages')->name('news.storeCKEditorImages');
    Route::resource('news', 'NewsController');

    // Branch
    Route::delete('branches/destroy', 'BranchController@massDestroy')->name('branches.massDestroy');
    Route::resource('branches', 'BranchController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::resource('teams', 'TeamController');

    // Main Header
    Route::delete('main-headers/destroy', 'MainHeaderController@massDestroy')->name('main-headers.massDestroy');
    Route::post('main-headers/media', 'MainHeaderController@storeMedia')->name('main-headers.storeMedia');
    Route::post('main-headers/ckmedia', 'MainHeaderController@storeCKEditorImages')->name('main-headers.storeCKEditorImages');
    Route::resource('main-headers', 'MainHeaderController');

    // Application
    Route::delete('applications/destroy', 'ApplicationController@massDestroy')->name('applications.massDestroy');
    Route::resource('applications', 'ApplicationController', ['except' => ['create', 'store', 'edit', 'update']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
