<?php

Route::redirect('/', '/get-started');
Route::get('/get-started', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('auth.login');
});

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => true]);

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

    // Business
    Route::post('business/media', 'BusinessController@storeMedia')->name('business.storeMedia');
    Route::post('business/ckmedia', 'BusinessController@storeCKEditorImages')->name('business.storeCKEditorImages');
    Route::resource('business', 'BusinessController');
    Route::put('business/{business}/logo', 'BusinessController@updateLogo')->name('business.updateLogo');

    // business profile
    Route::get('account/profile', 'BusinessController@profile')->name('business.profile');

    // Inventory
    Route::delete('inventories/destroy', 'InventoryController@massDestroy')->name('inventories.massDestroy');
    Route::post('inventories/media', 'InventoryController@storeMedia')->name('inventories.storeMedia');
    Route::post('inventories/ckmedia', 'InventoryController@storeCKEditorImages')->name('inventories.storeCKEditorImages');
    Route::resource('inventories', 'InventoryController');

    // properties
    Route::get('property/{id}/delete', 'PropertyController@deleteProperty')->name('property.delete');
    Route::resource('properties', 'PropertyController');

    // tenants
    Route::post('tenants/media', 'TenantController@storeMedia')->name('tenants.storeMedia');
    Route::post('tenants/ckmedia', 'TenantController@storeCKEditorImages')->name('tenants.storeCKEditorImages');
    Route::resource('tenants', 'TenantController');
    Route::get('tenants/{id}/vacate', 'TenantController@vacate')->name('tenants.vacate');
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
