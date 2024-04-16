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

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('failed-jobs')->name('failed-jobs/')->group(static function() {
            Route::get('/',                                             'FailedJobsController@index')->name('index');
            Route::get('/create',                                       'FailedJobsController@create')->name('create');
            Route::post('/',                                            'FailedJobsController@store')->name('store');
            Route::get('/{failedJob}/edit',                             'FailedJobsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FailedJobsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{failedJob}',                                 'FailedJobsController@update')->name('update');
            Route::delete('/{failedJob}',                               'FailedJobsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('media')->name('media/')->group(static function() {
            Route::get('/',                                             'MediaController@index')->name('index');
            Route::get('/create',                                       'MediaController@create')->name('create');
            Route::post('/',                                            'MediaController@store')->name('store');
            Route::get('/{medium}/edit',                                'MediaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MediaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{medium}',                                    'MediaController@update')->name('update');
            Route::delete('/{medium}',                                  'MediaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('migrations')->name('migrations/')->group(static function() {
            Route::get('/',                                             'MigrationsController@index')->name('index');
            Route::get('/create',                                       'MigrationsController@create')->name('create');
            Route::post('/',                                            'MigrationsController@store')->name('store');
            Route::get('/{migration}/edit',                             'MigrationsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MigrationsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{migration}',                                 'MigrationsController@update')->name('update');
            Route::delete('/{migration}',                               'MigrationsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('model-has-permissions')->name('model-has-permissions/')->group(static function() {
            Route::get('/',                                             'ModelHasPermissionsController@index')->name('index');
            Route::get('/create',                                       'ModelHasPermissionsController@create')->name('create');
            Route::post('/',                                            'ModelHasPermissionsController@store')->name('store');
            Route::get('/{modelHasPermission}/edit',                    'ModelHasPermissionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ModelHasPermissionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{modelHasPermission}',                        'ModelHasPermissionsController@update')->name('update');
            Route::delete('/{modelHasPermission}',                      'ModelHasPermissionsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('model-has-roles')->name('model-has-roles/')->group(static function() {
            Route::get('/',                                             'ModelHasRolesController@index')->name('index');
            Route::get('/create',                                       'ModelHasRolesController@create')->name('create');
            Route::post('/',                                            'ModelHasRolesController@store')->name('store');
            Route::get('/{modelHasRole}/edit',                          'ModelHasRolesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ModelHasRolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{modelHasRole}',                              'ModelHasRolesController@update')->name('update');
            Route::delete('/{modelHasRole}',                            'ModelHasRolesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('password-reset-tokens')->name('password-reset-tokens/')->group(static function() {
            Route::get('/',                                             'PasswordResetTokensController@index')->name('index');
            Route::get('/create',                                       'PasswordResetTokensController@create')->name('create');
            Route::post('/',                                            'PasswordResetTokensController@store')->name('store');
            Route::get('/{passwordResetToken}/edit',                    'PasswordResetTokensController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PasswordResetTokensController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{passwordResetToken}',                        'PasswordResetTokensController@update')->name('update');
            Route::delete('/{passwordResetToken}',                      'PasswordResetTokensController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('personal-access-tokens')->name('personal-access-tokens/')->group(static function() {
            Route::get('/',                                             'PersonalAccessTokensController@index')->name('index');
            Route::get('/create',                                       'PersonalAccessTokensController@create')->name('create');
            Route::post('/',                                            'PersonalAccessTokensController@store')->name('store');
            Route::get('/{personalAccessToken}/edit',                   'PersonalAccessTokensController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PersonalAccessTokensController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{personalAccessToken}',                       'PersonalAccessTokensController@update')->name('update');
            Route::delete('/{personalAccessToken}',                     'PersonalAccessTokensController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('role-has-permissions')->name('role-has-permissions/')->group(static function() {
            Route::get('/',                                             'RoleHasPermissionsController@index')->name('index');
            Route::get('/create',                                       'RoleHasPermissionsController@create')->name('create');
            Route::post('/',                                            'RoleHasPermissionsController@store')->name('store');
            Route::get('/{roleHasPermission}/edit',                     'RoleHasPermissionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RoleHasPermissionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{roleHasPermission}',                         'RoleHasPermissionsController@update')->name('update');
            Route::delete('/{roleHasPermission}',                       'RoleHasPermissionsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('users')->name('users/')->group(static function() {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('wysiwyg-media')->name('wysiwyg-media/')->group(static function() {
            Route::get('/',                                             'WysiwygMediaController@index')->name('index');
            Route::get('/create',                                       'WysiwygMediaController@create')->name('create');
            Route::post('/',                                            'WysiwygMediaController@store')->name('store');
            Route::get('/{wysiwygMedia}/edit',                          'WysiwygMediaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'WysiwygMediaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{wysiwygMedia}',                              'WysiwygMediaController@update')->name('update');
            Route::delete('/{wysiwygMedia}',                            'WysiwygMediaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('permissions')->name('permissions/')->group(static function() {
            Route::get('/',                                             'PermissionsController@index')->name('index');
            Route::get('/create',                                       'PermissionsController@create')->name('create');
            Route::post('/',                                            'PermissionsController@store')->name('store');
            Route::get('/{permission}/edit',                            'PermissionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PermissionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{permission}',                                'PermissionsController@update')->name('update');
            Route::delete('/{permission}',                              'PermissionsController@destroy')->name('destroy');
        });
    });
});