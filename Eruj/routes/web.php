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
    if(session()->has('user')){
        return redirect('dashboard');
    }
    
    return view('welcome');
    
});

// Auth::routes();

Route::post('/dashboard', [App\Http\Controllers\User::class, 'CreateSession']);
Route::get('/dashboard',function(){
    if(!(session()->has('user'))){
        
        return redirect('/');;
    }
    return view('dashboard');
    
});

Route::get('/logout',function(Request $request){
    if(session()->has('user')){
        // session()->pull('user');
        session()->forget('user');
    }
    return redirect('/');
});

Route::get('/login',function(){
    if(session()->has('user')){
        return redirect('dashboard');
    }
    
    return view('login');
   
});