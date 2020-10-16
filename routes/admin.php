<?php

// Authentication Routes...
Route::namespace('Auth')->group(function () {

    // login
    Route::get('/login', 'LoginController@showLoginForm')
        ->name('admin.show_login_form');
    Route::post('login', 'LoginController@login')
        ->name('admin.login');

    // logout
    Route::post('logout', 'LoginController@logout')
        ->name('admin.logout');

    Route::get('/email/verify/{id}/{hash}',
        'VerificationController@verify')->name('admin.verification.verify');

    Route::post('email/resend',
        'VerificationController@resend')->name('admin.verification.resend');

    Route::get('email/verify',
        'VerificationController@show'
    )->name('admin.verification.notice');


    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')
        ->name('admin.password.request');


    Route::post('password/email','ForgotPasswordController@sendResetLinkEmail')
        ->name('admin.password.email');

    Route::get('password/reset/{token}','ResetPasswordController@showResetForm')
        ->name('admin.password.reset');


    Route::post('password/reset','ResetPasswordController@reset')
        ->name('admin.password.update');
});

