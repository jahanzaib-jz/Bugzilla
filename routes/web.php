<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

 // Route::get('/drafts', 'PostController@drafts')
 //        ->name('list_drafts')
 //        ->middleware('auth');

 //    Route::get('/show/{id}', 'PostController@show')
 //        ->name('show_post');

    Route::get('/project/new', 'ProjectController@create')
        ->name('new_project')
        ->middleware('if:isManager');

        Route::post('/project/create', 'ProjectController@store')
        ->name('create_project')
        ->middleware('if:isManager');

        Route::get('/project/assignment', 'ProjectController@assignProject')
        ->name('assign_project')
        ->middleware('if:isManager');

        Route::get('/project/show', 'ProjectController@show')
        ->name('show_project')
        ->middleware('auth');

    Route::get('/bug/create', 'BugController@create')
        ->name('create_bug')
        ->middleware('if:isQA');

        Route::post('/bug/store', 'BugController@store')
        ->name('store_bug')
        ->middleware('if:isQA');

        Route::get('/bug/show', 'BugController@show')
        ->name('create_bug')
        ->middleware('if:isQA','if:isDeveloper');

        Route::get('/bug/reported', 'BugController@reported')
        ->name('reported_bugs')
        ->middleware('if:isDeveloper');

        Route::get('/bug/resolved', 'BugController@resolved')
        ->name('resolved_bug')
        ->middleware('if:isDeveloper');



    // Route::get('/edit/{post}', 'PostController@edit')
    //     ->name('edit_post')
    //     ->middleware('can:update-post,post');
    // Route::post('/edit/{post}', 'PostController@update')
    //     ->name('update_post')
    //     ->middleware('can:update-post,post');
        
    // Route::get('/publish/{post}', 'PostController@publish')
    //     ->name('publish_post')
    //     ->middleware('can:publish-post');

// Authentication Routes...
// Route::get('login', [
//   'as' => 'login',
//   'uses' => 'Auth\LoginController@showLoginForm'
// ]);
// Route::post('login', [
//   'as' => '',
//   'uses' => 'Auth\LoginController@login'
// ]);
// Route::post('logout', [
//   'as' => 'logout',
//   'uses' => 'Auth\LoginController@logout'
// ]);

// // Password Reset Routes...
// Route::post('password/email', [
//   'as' => 'password.email',
//   'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
// ]);
// Route::get('password/reset', [
//   'as' => 'password.request',
//   'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
// ]);
// Route::post('password/reset', [
//   'as' => 'password.update',
//   'uses' => 'Auth\ResetPasswordController@reset'
// ]);
// Route::get('password/reset/{token}', [
//   'as' => 'password.reset',
//   'uses' => 'Auth\ResetPasswordController@showResetForm'
// ]);



Route::get('/home', 'HomeController@index')->name('home');
