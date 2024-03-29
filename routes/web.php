<?php

use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\User;

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

    // properties
    Route::get('property/{id}/delete', 'PropertyController@deleteProperty')->name('property.delete');
    Route::resource('properties', 'PropertyController');

    // tenants
    Route::post('tenants/media', 'TenantController@storeMedia')->name('tenants.storeMedia');
    Route::post('tenants/ckmedia', 'TenantController@storeCKEditorImages')->name('tenants.storeCKEditorImages');
    Route::resource('tenants', 'TenantController');
    Route::get('tenants/{id}/vacate', 'TenantController@vacate')->name('tenants.vacate');
    Route::get('tenants/{id}/delete', 'TenantController@deleteTenant')->name('tenants.delete');
    Route::post('send-reminder', 'TenantController@sendReminder')->name('tenants.sendReminder');
    Route::get('tenant/{id}/record-payment', 'TenantController@recordTenantPayment')->name('tenants.record.payment');
    Route::get('send-invoice/{id}/tenant', 'TenantController@sendEmailInvoice')->name('tenants.send.invoice');
    Route::get('tenant/{id}/print-invoice', 'TenantController@printInvoice')->name('tenants.print.invoice');

    // search tenants
    Route::post('search-tenants', 'TenantController@searchTenants')->name('tenants.search');
    Route::get('tenant/search/keyword={query}', 'TenantController@displaySearchTenants')->name('tenants.search.query');

    // tenants payment
    Route::post('tenant-payments', 'TenantPaymentController@storePayment')->name('tenant-payments.storePayment');

    // accounts
    Route::get('all-records', 'AccountController@allAccountsRecords')->name('accounts.allRecords');

    // tenants payment
    Route::get('tenant/create-payment', 'TenantPaymentController@createPayment')->name('tenant-payments.create');
    Route::get('tenant/overdue-payments', 'TenantPaymentController@overduePayments')->name('tenant-payments.overdue');
    Route::get('tenant/transactions', 'TenantPaymentController@transactions')->name('tenant-payments.transactions');

    // tenant penalties
    Route::resource('penalties', 'PenaltyController');

    // Daraja Credentials
    Route::get('darajas', 'DarajaController@index')->name('darajas.index');

    Route::get('darajas/create', 'DarajaController@create')->name('darajas.create');
    Route::post('darajas/store', 'DarajaController@store')->name('darajas.store');

    Route::put('darajas/edit/{daraja}', 'DarajaController@edit')->name('darajas.edit');
    Route::put('darajas/update/{daraja}', 'DarajaController@update')->name('darajas.update');

    Route::delete('darajas/{daraja}', 'DarajaController@destroy')->name('darajas.destroy');
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
