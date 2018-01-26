<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//read all Authors resources
Route::get('authors', 'AuthorsController@getAll');

//read Author resource by ID
Route::get('authors/{id}', 'AuthorsController@getByID');

//create new Author resource
Route::post('authors', 'AuthorsController@newAuthorUpdateAuthor');

//update Author resource by ID
Route::put('authors/{id}', 'AuthorsController@newAuthorUpdateAuthor');

//delete Author resource by ID
Route::delete('authors/{id}', 'AuthorsController@deleteAuthor');



//read all Books resources
Route::get('books', 'BooksController@getAll');

//read Book resource by ID
Route::get('books/{id}', 'BooksController@getByID');

//create new Book resource
Route::post('books', 'BooksController@newBookUpdateBook');

//update Book resource by ID
Route::put('books/{id}', 'BooksController@newBookUpdateBook');

//delete Book resource by ID
Route::delete('books/{id}', 'BooksController@deleteBook');



//read all Shelves resources
Route::get('shelves', 'ShelvesController@getAll');

//read Shelve resource by ID
Route::get('shelves/{id}', 'ShelvesController@getByID');

//create new Shelve resource
Route::post('shelves', 'ShelvesController@newShelveUpdateShelve');

//update Shelve resource by ID
Route::put('shelves/{id}', 'ShelvesController@newShelveUpdateShelve');

//delete Shelve resource by ID
Route::delete('shelves/{id}', 'ShelvesController@deleteShelve');