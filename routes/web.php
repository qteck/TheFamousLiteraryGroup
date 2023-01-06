<?php
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

Route::get('/', 'ArticleController@show');
Route::get('/article/{title}/{id}', 'ArticleController@showArticle');

Route::get('/books', 'BookController@show');
Route::get('/books/{bookTitle}/{id}', 'BookController@showBook');
Route::get('/books/{bookTitle}/{title}/{id}', 'BooksContentsController@showChapter');


Route::get('/manifest', function () {
    return view('tests');
});

Route::get('/donation', 'DonationController@show');
Route::get('/the-famous-translations', 'TranslationController@show');
Route::get('/the-famous-translations/{title}/{id}', 'TranslationController@showTranslation');

Route::get('/the-daily-scrap/{title}/{id}', 'ShowScrapController@showSingleScrap');
Route::get('/the-daily-scrap', 'ShowScrapController@show');
Route::get('/the-daily-scrap/1/beforeUpdate/{id}', 'ShowScrapController@fillFormBeforeUpdate');
Route::post('/the-daily-scrap/update/{id}', 'ShowScrapController@update');
Route::post('/the-daily-scrap/create', 'ShowScrapController@create');

Route::post('/subscribe', 'SubscribersController@create');
