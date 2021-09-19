<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\iamController;
use Faker\Guesser\Name;
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
Route::get('/', function () 
{
    return view('welcome');    
})->name('home');
// ROUTE FOR PAGE CONTROLLER
Route::get      ('/',           [PageController::class, 'Home'])->          name('home');
Route::get      ('/contact',    [PageController::class, 'Contact'])->       name('contact');
Route::get      ('/about',      [PageController::class, 'AboutUs'])->       name('about');
//ROUTE FOR USER CONTROLLER
Route::get      ('/login',      [UserController::class, 'loginForm'])->     name('login');
Route::post     ('/login',      [UserController::class, 'loginAction'])->   name('login.action');
Route::get      ('/logout',     [UserController::class, 'logOut'])->        name('logout');
Route::delete   ('/user/{id}',  [UserController::class, 'destroy'])->       name('user.destroy');
Route::resource ('user',         UserController::class);

Route::get      ('/password',   [UserController::class, 'sandForm'])->      name('password');
Route::post     ('/password',   [UserController::class, 'sandAction'])->    name('password.action');
// Route::post ('/edit',   [UserController::class, 'edit'])->          name('edit');
// ROUTE FOR POST CONTROLLER
Route::resource ('post',         PostController::class);
Route::get      ('post/view',   [PostController::class, 'View'])->          name('post.view');
// Route::get('/user/{id}', 'UserController@destroy');

// Route::get('/',[iamController::class,'iamSoft'])->name('soft');