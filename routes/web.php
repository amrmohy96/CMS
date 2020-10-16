<?php
use Illuminate\Support\Facades\Route;
Route::namespace('Auth')->group(function () {
// Authentication Routes...

// login
    Route::get('/login', 'LoginController@showLoginForm')
        ->name('dashboard.show_login_form');

    Route::post('login', 'LoginController@login')
        ->name('dashboard.login');

    Route::post('logout', 'LoginController@logout')
        ->name('dashboard.logout');

    Route::get('register',
        'RegisterController@showRegistrationForm'
    )->name('dashboard.show_register_form');

    Route::post('register',
        'RegisterController@register')->name('dashboard.register');

    Route::get('password/reset',
        'ForgotPasswordController@showLinkRequestForm')
        ->name('password.request');

    Route::post('password/email',
        'ForgotPasswordController@sendResetLinkEmail')
        ->name('password.email');

    Route::get('password/reset/{token}',
        'ResetPasswordController@showResetForm')
        ->name('password.reset');

    Route::post('password/reset',
        'ResetPasswordController@reset')
        ->name('password.update');

    Route::get('email/verify',
        'VerificationController@show')
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}',
        'VerificationController@verify')
        ->name('verification.verify');

    Route::post('email/resend',
        'VerificationController@resend')
        ->name('verification.resend');

});

Route::get('/', 'IndexController@index')
    ->name('frontend.index');

// posts
Route::get('/{slug}', 'IndexController@postShow')
    ->name('posts.show');

// store comment

Route::post('/{slug}', 'IndexController@storeComment')
    ->name('posts.comments.store');

// show contact contactForm

Route::get('/show/contact', 'IndexController@contactForm')
    ->name('contact.form.show');

// contact.form.save
Route::post('/show/contact', 'IndexController@contactFormSave')
    ->name('contact.form.save');

// category
Route::get('/category/{slug}', 'IndexController@category')
    ->name('frontend.category');
// archive

Route::get('/archive/{date}', 'IndexController@archive')
    ->name('frontend.archive');

//  author
Route::get('/author/{username}', 'IndexController@author')
    ->name('frontend.author');

Route::middleware('verified')->group(function (){
    Route::get('/cms/dashboard','UsersController@index')
        ->name('cms.dashboard');

   // Route::resource('users', 'UsersController');
    Route::get('/users/post/create','UsersController@create')
        ->name('users.post.create');

    Route::post('/users/post/create','UsersController@store')
        ->name('users.post.store');

    // edit
    Route::get('/users/post/edit/{id}','UsersController@edit')
        ->name('users.post.edit');

    Route::put('/users/post/edit/{id}','UsersController@update')
        ->name('users.post.update');

    Route::post('/users/post/media/delete/{id}','UsersController@delMedia')
        ->name('users.post.media.destroy');

    Route::delete('/users/post/delete/{id}','UsersController@destroy')
        ->name('users.post.destroy');

    // comments
    //Route::prefix('manage')->resource('comments', 'CommentsController');

    // manage comments
    Route::get('/users/comments/manage','CommentsController@index')
        ->name('users.comments.manage');

});
