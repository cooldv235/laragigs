<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store listing
Route::post('/listings',[ListingController::class,'store']);

// Single listing
// Route::get('/view-listing/{id}',function($id){
//     $listing = Listing::find($id);

//     if($listing){
//         return view('view_listing',[        
//             'listing' => $listing
//         ]);
//     } else {
//         abort('404');
//     }
    
// });

// MUCH CLEANER OF ABOVE ROUTE, AND WORKS THE SAME WAY
Route::get('/view-listing/{listing}',[ListingController::class,'show']);

// Simple route example
Route::get('/test', function () {
    return 'Hello world';
});

// route with return response example
Route::get('/test-response', function () {
    return response('<h1>hello world</h1>', 200)->header('Content-Type', 'text/plain')->header('foo', 'bar');
});

// routes with param example and with constraint
Route::get('/posts/{id}', function ($id) {
    // dd($id);    // dump and die
    // ddd($id);    // dump die and debug
    return response('Post no. ' . $id);
})->where('id', '[0-9]+');

// example route with request variable of laravel
Route::get('/search', function (Request $request) {
    // dd($request);
    // using variable of this object
    dd('Name : ' . $request->name);
});

/**
 * Common resource routes
 * index - Show all listings
 * show - Show single listing
 * create - Show form to create a new listing 
 * store - store new listing 
 * edit - show form to edit a listing
 * update - update listing
 * destroy - delete a listing
 */
