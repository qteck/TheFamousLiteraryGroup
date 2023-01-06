<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BookController extends Controller
{
	/**
	 * type == 1 stands for article.
	 */
    public function show () {

        $books = \App\Book::orderBy('id','DESC')->where("publish_date", "<", Carbon::now())->get();
    
        return view('books', ['books' => $books]);
        
    }

    public function showBook($title, $id){
        $book = \App\Book::findOrFail($id);

        return view('book', ['book' => $book, 'title' => str_replace('-', ' ', Str::title($title))]);
    }

    public function showChapter($title, $id){
        $article = \App\Article::findOrFail($id);;

        return view('showBook', ['book' => $book, 'title' => str_replace('-', ' ', Str::title($title))]);
    }

}