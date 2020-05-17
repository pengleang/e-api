<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('generate-pdf','PDFController@generatePDF');
Route::get('qr-code-g', function () {
    \QrCode::size(500)
            ->format('png')
            ->generate('sabaytraining.com', public_path('images/qrcode.png'));

  return view('qrCode');

});
//Database Raw SQL Queries
Route::get('/read', function(){
    $results = DB::select('select * from users');
    //$results = DB::select('select * from users where id = :id', ['id' => 9]);
    //$results = DB::select('select * from users where id= ?',[2]);
    /**  * return view('user.index', ['users' => $users]);  *compact($users); ['users' => $users]
       * }*/
      foreach ($results as $user) {
        echo "The name is ".$user->name . " and email is " .$user->email . "<br>";
      }
      //return var_dump($results); //$results is the class, so that object like $results->name, $results->email ...
});
Route::get('/insert', function(){
DB::insert('insert into users (name, email, is_admin, password) values (?,?,?,?)', ['visoth', 'visoth@gmail.com', 1, '12345']);
});
Route::get('/update', function(){
    $affected = DB::update('update users set name = "Leang" where id = ?', ['9']);
    return "There is ". $affected . " updated."; //$affected is the updated number
});
Route::get('/delete', function(){
    $deleted = DB::delete('delete from users where id =?', [9]);
    return "There is ". $deleted ." deleted.";//$deleted is the deleted number
});
Route::get('/drop', function(){
    DB::statement('drop table users');
});
