<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('web.home');
});

Route::get('/prestasi', function () {
    return view('web.prestasi');
});

Route::get('/berita', function () {
    return view('web.berita');
});

Route::get('/galery', function () {
    return view('web.galery');
});

// Auth::routes();

Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');

Route::get('/registration', [App\Http\Controllers\Auth\AuthController::class, 'registration'])->name('registration');
Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register.save');

Route::group(['middleware' => ['auth']], function() {
    Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

    Route::prefix('dashboards')->group(function () {
        Route::name('dashboards.')->group(function () {
            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('general');
            Route::get('/transaction-summary', [App\Http\Controllers\Dashboards\GeneralDashboardController::class, 'getTransactionSummary'])->name('transaction-summary');
            Route::get('/sales-trend', [App\Http\Controllers\Dashboards\GeneralDashboardController::class, 'getWeeklySales'])->name('sales-trend');
            Route::get('/top-selling-products', [App\Http\Controllers\Dashboards\GeneralDashboardController::class, 'topSellingProducts'])->name('top-selling-products');
        });
    });

    // Registration verification & Approval

    Route::prefix('registrations')->group(function () {
        Route::name('registrations.')->group(function () {
            Route::get('/', [App\Http\Controllers\RegistrationController::class, 'index'])->name('index');
            Route::get('/lists', [App\Http\Controllers\RegistrationController::class, 'getLists'])->name('get-lists');

            Route::post('/approve/{id}', [App\Http\Controllers\RegistrationController::class, 'approve']);
            Route::post('/reject/{id}', [App\Http\Controllers\RegistrationController::class, 'reject']);
        });
    });

    // Athlete

    Route::prefix('athletes')->group(function () {
        Route::name('athletes.')->group(function () {
            Route::get('/', [App\Http\Controllers\AthleteController::class, 'index'])->name('index');
            Route::get('/lists', [App\Http\Controllers\AthleteController::class, 'getLists'])->name('get-lists');
            Route::get('/create', [App\Http\Controllers\AthleteController::class, 'create'])->name('create');
            Route::post('/save', [App\Http\Controllers\AthleteController::class, 'save'])->name('save');
            Route::get('/edit/{id}', [App\Http\Controllers\AthleteController::class, 'edit'])->name('edit');
            Route::post('/update', [App\Http\Controllers\AthleteController::class, 'update'])->name('update');

            Route::post('/approve/{id}', [App\Http\Controllers\AthleteController::class, 'approve']);
            Route::post('/reject/{id}', [App\Http\Controllers\AthleteController::class, 'reject']);
        });
    });

    // Athlete Managers

    Route::prefix('athlete-managers')->group(function () {
        Route::name('athlete-managers.')->group(function () {
            Route::get('/', [App\Http\Controllers\AthleteManagersController::class, 'index'])->name('index');
            Route::get('/lists', [App\Http\Controllers\AthleteManagersController::class, 'getLists'])->name('get-lists');
            Route::get('/create', [App\Http\Controllers\AthleteManagersController::class, 'create'])->name('create');
            Route::post('/save', [App\Http\Controllers\AthleteManagersController::class, 'save'])->name('save');
            Route::get('/edit/{id}', [App\Http\Controllers\AthleteManagersController::class, 'edit'])->name('edit');
            Route::post('/update', [App\Http\Controllers\AthleteManagersController::class, 'update'])->name('update');
        });
    });

    // Accounts Management & Core Modules

    Route::prefix('users')->group(function () {
        Route::name('users.')->group(function () {
            Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
            Route::get('/lists', [App\Http\Controllers\UserController::class, 'getLists'])->name('get-lists');
            Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
            Route::post('/save', [App\Http\Controllers\UserController::class, 'save'])->name('save');
            Route::get('/edit/{userId}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
            Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');

            Route::get('/change-password/{userId}', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change-password');
            Route::post('/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update-password');
        });
    });

    Route::prefix('groups')->group(function () {
        Route::name('groups.')->group(function () {
            Route::get('/', [App\Http\Controllers\GroupController::class, 'index'])->name('index');
            Route::get('/lists', [App\Http\Controllers\GroupController::class, 'getLists'])->name('get-lists');
            Route::get('/create', [App\Http\Controllers\GroupController::class, 'create'])->name('create');
            Route::post('/save', [App\Http\Controllers\GroupController::class, 'save'])->name('save');
            Route::get('/edit/{groupId}', [App\Http\Controllers\GroupController::class, 'edit'])->name('edit');
            Route::get('/menu-access/{groupId}', [App\Http\Controllers\GroupController::class, 'menuAccess'])->name('menu-access');
            Route::post('/update', [App\Http\Controllers\GroupController::class, 'update'])->name('update');
            Route::post('/update-menu-access', [App\Http\Controllers\GroupController::class, 'updateMenuAccess'])->name('update-menu-access');
        });
    });

    Route::prefix('menus')->group(function () {
        Route::name('menus.')->group(function () {
            Route::get('/', [App\Http\Controllers\MenuController::class, 'index'])->name('index');
            Route::get('/lists', [App\Http\Controllers\MenuController::class, 'getLists'])->name('get-lists');
            Route::get('/create', [App\Http\Controllers\MenuController::class, 'create'])->name('create');
            Route::post('/save', [App\Http\Controllers\MenuController::class, 'save'])->name('save');
            Route::get('/edit/{menuId}', [App\Http\Controllers\MenuController::class, 'edit'])->name('edit');
            Route::post('/update', [App\Http\Controllers\MenuController::class, 'update'])->name('update');
        });
    });

    // Posting

    Route::prefix('posts')->group(function () {
        Route::name('posts.')->group(function () {
            Route::prefix('news')->group(function () {
                Route::name('news.')->group(function () {
                    Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('index');
                    Route::get('/lists', [App\Http\Controllers\NewsController::class, 'getLists'])->name('get-lists');
                    Route::get('/create', [App\Http\Controllers\NewsController::class, 'create'])->name('create');
                    Route::post('/save', [App\Http\Controllers\NewsController::class, 'save'])->name('save');
                    Route::get('/edit/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('edit');
                    Route::post('/update/{id}', [App\Http\Controllers\NewsController::class, 'update'])->name('update');
                    Route::delete('/delete/{id}', [App\Http\Controllers\NewsController::class, 'delete'])->name('delete');
                });
            });
            Route::prefix('galeries')->group(function () {
                Route::name('galeries.')->group(function () {
                    Route::get('/', [App\Http\Controllers\GaleryController::class, 'index'])->name('index');
                    Route::get('/lists', [App\Http\Controllers\GaleryController::class, 'getLists'])->name('get-lists');
                    Route::get('/create', [App\Http\Controllers\GaleryController::class, 'create'])->name('create');
                    Route::post('/save', [App\Http\Controllers\GaleryController::class, 'save'])->name('save');
                    Route::get('/edit/{id}', [App\Http\Controllers\GaleryController::class, 'edit'])->name('edit');
                    Route::post('/update/{id}', [App\Http\Controllers\GaleryController::class, 'update'])->name('update');
                    Route::delete('/delete/{id}', [App\Http\Controllers\GaleryController::class, 'delete'])->name('delete');
                });
            });
        });
    });

    // Master Data

    Route::prefix('cabang-olahraga')->group(function () {
        Route::name('cabang-olahraga.')->group(function () {
            Route::get('/', [App\Http\Controllers\SportController::class, 'index'])->name('index');
            Route::get('/lists', [App\Http\Controllers\SportController::class, 'getLists'])->name('get-lists');
            Route::get('/create', [App\Http\Controllers\SportController::class, 'create'])->name('create');
            Route::post('/save', [App\Http\Controllers\SportController::class, 'save'])->name('save');
            Route::get('/edit/{id}', [App\Http\Controllers\SportController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [App\Http\Controllers\SportController::class, 'update'])->name('update');
            Route::post('/delete', [App\Http\Controllers\SportController::class, 'delete'])->name('delete');
        });
    });

    Route::prefix('kecamatan')->group(function () {
        Route::name('kecamatan.')->group(function () {
            Route::get('/', [App\Http\Controllers\KecamatanController::class, 'index'])->name('index');
            Route::get('/lists', [App\Http\Controllers\KecamatanController::class, 'getLists'])->name('get-lists');
            Route::get('/create', [App\Http\Controllers\KecamatanController::class, 'create'])->name('create');
            Route::post('/save', [App\Http\Controllers\KecamatanController::class, 'save'])->name('save');
            Route::get('/edit/{id}', [App\Http\Controllers\KecamatanController::class, 'edit'])->name('edit');
            Route::post('/update', [App\Http\Controllers\KecamatanController::class, 'update'])->name('update');
            Route::post('/delete', [App\Http\Controllers\KecamatanController::class, 'delete'])->name('delete');
        });
    });

    Route::prefix('rayon')->group(function () {
        Route::name('rayon.')->group(function () {
            Route::get('/', [App\Http\Controllers\RayonController::class, 'index'])->name('index');
            Route::get('/lists', [App\Http\Controllers\RayonController::class, 'getLists'])->name('get-lists');
            Route::get('/create', [App\Http\Controllers\RayonController::class, 'create'])->name('create');
            Route::post('/save', [App\Http\Controllers\RayonController::class, 'save'])->name('save');
            Route::get('/edit/{id}', [App\Http\Controllers\RayonController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [App\Http\Controllers\RayonController::class, 'update'])->name('update');
            Route::post('/delete', [App\Http\Controllers\RayonController::class, 'delete'])->name('delete');
        });
    });

    Route::prefix('sub-rayon')->group(function () {
        Route::name('sub-rayon.')->group(function () {
            Route::get('/', [App\Http\Controllers\SubRayonController::class, 'index'])->name('index');
            Route::get('/lists', [App\Http\Controllers\SubRayonController::class, 'getLists'])->name('get-lists');
            Route::get('/create', [App\Http\Controllers\SubRayonController::class, 'create'])->name('create');
            Route::post('/save', [App\Http\Controllers\SubRayonController::class, 'save'])->name('save');
            Route::get('/edit/{id}', [App\Http\Controllers\SubRayonController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [App\Http\Controllers\SubRayonController::class, 'update'])->name('update');
            Route::post('/delete', [App\Http\Controllers\SubRayonController::class, 'delete'])->name('delete');
        });
    });
});
