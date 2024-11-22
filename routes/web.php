<?php

use App\Http\Controllers\ProfileController;
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


Route::get('/', function () {
    return view('frontend.index');
});

Route::get("/about","App\Http\Controllers\FrontendController@about");
Route::get("/service","App\Http\Controllers\FrontendController@service");
Route::get("/achievements","App\Http\Controllers\FrontendController@achievements");
Route::get("/gallery","App\Http\Controllers\FrontendController@gallery");
Route::get("/contact","App\Http\Controllers\FrontendController@contact");
Route::get("/awards","App\Http\Controllers\FrontendController@awards");
Route::get("/logo","App\Http\Controllers\FrontendController@logo");



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get("/dashboard","App\Http\Controllers\AdminController@dashboard")->name('dashboard');


    Route::prefix('gallery')->group(function () {
        Route::get("/","App\Http\Controllers\GalleryController@index")->name('gallery');
        Route::post("/store","App\Http\Controllers\GalleryController@store")->name('gallery_store');
        Route::get("/delete/{id}","App\Http\Controllers\GalleryController@delete")->name('gallery_delete');
    });

    Route::prefix('achievement')->group(function () {
        Route::get("/","App\Http\Controllers\AchievementsController@index")->name('achievement');
        Route::post("/store","App\Http\Controllers\AchievementsController@store")->name('achievement_store');
        Route::get("/show/{id}","App\Http\Controllers\AchievementsController@show")->name('achievement_show');
        Route::get("/create/{id}","App\Http\Controllers\AchievementsController@create")->name('achievement_create');
        Route::post("/store/data","App\Http\Controllers\AchievementsController@store_data")->name('achievement_store_data');
        Route::get("/edit/{id}","App\Http\Controllers\AchievementsController@edit")->name('achievement_edit');
        Route::put("/update/{id}","App\Http\Controllers\AchievementsController@update")->name('achievement_update');
        Route::get("/delete/{id}","App\Http\Controllers\AchievementsController@item_delete")->name('achievement_delete');
        Route::get("/all/delete/{id}","App\Http\Controllers\AchievementsController@all_delete")->name('achievement_all_delete');

    });
    Route::prefix('logo')->group(function () {
        Route::get("/","App\Http\Controllers\LogoController@index")->name('logo');
        Route::post("/store","App\Http\Controllers\LogoController@store")->name('logo_store');
        Route::get("/show/{id}","App\Http\Controllers\LogoController@show")->name('logo_show');
        Route::get("/create/{id}","App\Http\Controllers\LogoController@create")->name('logo_create');
        Route::post("/store/data","App\Http\Controllers\LogoController@store_data")->name('logo_store_data');
        Route::get("/edit/{id}","App\Http\Controllers\LogoController@edit")->name('logo_edit');
        Route::put("/update/{id}","App\Http\Controllers\LogoController@update")->name('logo_update');
        Route::get("/delete/{id}","App\Http\Controllers\LogoController@item_delete")->name('logo_delete');
        Route::get("/all/delete/{id}","App\Http\Controllers\LogoController@all_delete")->name('logo_all_delete');
        
    });

    Route::prefix('awards')->group(function () {
        Route::get("/","App\Http\Controllers\Controller@index")->name('awards');
        Route::get("/show/{id}","App\Http\Controllers\AwardsController@show")->name('awards_show');
        Route::get("/create","App\Http\Controllers\AwardsController@create")->name('awards_create');
        Route::post("/store/data","App\Http\Controllers\AwardsController@store_data")->name('awards_store_data');
        Route::get("/edit/{id}","App\Http\Controllers\AwardsController@edit")->name('awards_edit');
        Route::put("/update/{id}","App\Http\Controllers\AwardsController@update")->name('awards_update');
        Route::get("/delete/{id}","App\Http\Controllers\AwardsController@item_delete")->name('awards_delete');
        Route::get("/all/delete/{id}","App\Http\Controllers\AwardsControlle@all_delete")->name('awards_all_delete');


    });
});
