<?php

use Illuminate\Support\Facades\Route;

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
        Route::prefix('areas')->name('areas/')->group(static function() {
            Route::get('/',                                             'AreasController@index')->name('index');
            Route::get('/create',                                       'AreasController@create')->name('create');
            Route::post('/',                                            'AreasController@store')->name('store');
            Route::get('/{area}/edit',                                  'AreasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AreasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{area}',                                      'AreasController@update')->name('update');
            Route::delete('/{area}',                                    'AreasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('careers')->name('careers/')->group(static function() {
            Route::get('/',                                             'CareersController@index')->name('index');
            Route::get('/create',                                       'CareersController@create')->name('create');
            Route::post('/',                                            'CareersController@store')->name('store');
            Route::get('/{career}/edit',                                'CareersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CareersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{career}',                                    'CareersController@update')->name('update');
            Route::delete('/{career}',                                  'CareersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('genders')->name('genders/')->group(static function() {
            Route::get('/',                                             'GendersController@index')->name('index');
            Route::get('/create',                                       'GendersController@create')->name('create');
            Route::post('/',                                            'GendersController@store')->name('store');
            Route::get('/{gender}/edit',                                'GendersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'GendersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{gender}',                                    'GendersController@update')->name('update');
            Route::delete('/{gender}',                                  'GendersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('institutions')->name('institutions/')->group(static function() {
            Route::get('/',                                             'InstitutionController@index')->name('index');
            Route::get('/create',                                       'InstitutionController@create')->name('create');
            Route::post('/',                                            'InstitutionController@store')->name('store');
            Route::get('/{institution}/edit',                           'InstitutionController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'InstitutionController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{institution}',                               'InstitutionController@update')->name('update');
            Route::delete('/{institution}',                             'InstitutionController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('institutions')->name('institutions/')->group(static function() {
            Route::get('/',                                             'InstitutionsController@index')->name('index');
            Route::get('/create',                                       'InstitutionsController@create')->name('create');
            Route::post('/',                                            'InstitutionsController@store')->name('store');
            Route::get('/{institution}/edit',                           'InstitutionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'InstitutionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{institution}',                               'InstitutionsController@update')->name('update');
            Route::delete('/{institution}',                             'InstitutionsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('typeinstitutions')->name('typeinstitutions/')->group(static function() {
            Route::get('/',                                             'TypeinstitutionsController@index')->name('index');
            Route::get('/create',                                       'TypeinstitutionsController@create')->name('create');
            Route::post('/',                                            'TypeinstitutionsController@store')->name('store');
            Route::get('/{typeinstitution}/edit',                       'TypeinstitutionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TypeinstitutionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{typeinstitution}',                           'TypeinstitutionsController@update')->name('update');
            Route::delete('/{typeinstitution}',                         'TypeinstitutionsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('modalities')->name('modalities/')->group(static function() {
            Route::get('/',                                             'ModalitiesController@index')->name('index');
            Route::get('/create',                                       'ModalitiesController@create')->name('create');
            Route::post('/',                                            'ModalitiesController@store')->name('store');
            Route::get('/{modality}/edit',                              'ModalitiesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ModalitiesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{modality}',                                  'ModalitiesController@update')->name('update');
            Route::delete('/{modality}',                                'ModalitiesController@destroy')->name('destroy');
        });
    });
});