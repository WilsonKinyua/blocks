<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesePaymentController;

// Route::any('/ipns/{daraja}/blocks-rent-payment/{action}', MpesePaymentController::class);

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
});
