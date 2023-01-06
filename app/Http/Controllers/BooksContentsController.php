<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BooksContentsController extends Controller
{
	/**
	 * type == 1 stands for article.
     * type == 2 translations
     * type == 3 not assigned
     * type == 4 forbidden
	 */

    public function show (){

    }

    public function showChapter($bookTitle, $title, $id) {
        $singleContent = \App\Books_content::where([ 
                ["type", "=", 1]
          ])->findOrFail($id);                                                                


        $contents = \App\Books_content::where([
            ["book_id", "=", $singleContent->book_id]
          ])->get();

        return view('showBookContent', ['singleContent' => $singleContent,'contents' => $contents, 'bookTitle' => str_replace('-', ' ', Str::title($bookTitle)), 'title' => str_replace('-', ' ', Str::title($title))]);
    }
}
