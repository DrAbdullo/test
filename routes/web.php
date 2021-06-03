<?php use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//         return view('home');
//     }

//);



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {  return view('home');}

);


Auth::routes();

        Route::get('/clientForm', 'App\Http\Controllers\UserController@clientForm')->name('clientForm');
        Route::get('manager', 'App\Http\Controllers\ManagerController@man_message_show')->name('manager');
        Route::post('/clientForm/ctmake', 'App\Http\Controllers\UserController@create')->name('create');
        Route::get('/clientForm/message_show/{id}', 'App\Http\Controllers\UserController@message_show')->name('message_show');
        Route::post('/manager/{id?}', 'App\Http\Controllers\ManagerController@manager_mess')->name('manager_mess');
        Route::get('/manager/man_message_show/{id?}', 'App\Http\Controllers\ManagerController@man_message_show')->name('man_message_show');



