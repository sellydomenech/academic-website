<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* CONTOH */

Route::get('/', function () {
    return view('main');
});

Route::get('home', function () {
    return view('main');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('teachers')->name('teachers/')->group(static function() {
            Route::get('/',                                             'TeacherController@index')->name('index');
            Route::get('/create',                                       'TeacherController@create')->name('create');
            Route::post('/',                                            'TeacherController@store')->name('store');
            Route::get('/{teacher}/edit',                               'TeacherController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TeacherController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{teacher}',                                   'TeacherController@update')->name('update');
            Route::delete('/{teacher}',                                 'TeacherController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('roles')->name('roles/')->group(static function() {
            Route::get('/',                                             'RolesController@index')->name('index');
            Route::get('/create',                                       'RolesController@create')->name('create');
            Route::post('/',                                            'RolesController@store')->name('store');
            Route::get('/{role}/edit',                                  'RolesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}',                                      'RolesController@update')->name('update');
            Route::delete('/{role}',                                    'RolesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('activations')->name('activations/')->group(static function() {
            Route::get('/',                                             'ActivationsController@index')->name('index');
            Route::get('/create',                                       'ActivationsController@create')->name('create');
            Route::post('/',                                            'ActivationsController@store')->name('store');
            Route::get('/{activation}/edit',                            'ActivationsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ActivationsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{activation}',                                'ActivationsController@update')->name('update');
            Route::delete('/{activation}',                              'ActivationsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-activations')->name('admin-activations/')->group(static function() {
            Route::get('/',                                             'AdminActivationsController@index')->name('index');
            Route::get('/create',                                       'AdminActivationsController@create')->name('create');
            Route::post('/',                                            'AdminActivationsController@store')->name('store');
            Route::get('/{adminActivation}/edit',                       'AdminActivationsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AdminActivationsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{adminActivation}',                           'AdminActivationsController@update')->name('update');
            Route::delete('/{adminActivation}',                         'AdminActivationsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-password-resets')->name('admin-password-resets/')->group(static function() {
            Route::get('/',                                             'AdminPasswordResetsController@index')->name('index');
            Route::get('/create',                                       'AdminPasswordResetsController@create')->name('create');
            Route::post('/',                                            'AdminPasswordResetsController@store')->name('store');
            Route::get('/{adminPasswordReset}/edit',                    'AdminPasswordResetsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AdminPasswordResetsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{adminPasswordReset}',                        'AdminPasswordResetsController@update')->name('update');
            Route::delete('/{adminPasswordReset}',                      'AdminPasswordResetsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AdminUsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
        });
    });
});