<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
	/**
	 * type == 1 stands for article.
     * type == 2 translations
     * type == 3 not assigned
     * type == 4 forbidden
	 */
    public function show (){
        $articles = \App\Article::orderBy('id','DESC')->where([
                                                                ["publish_date", "<", Carbon::now()], 
                                                                ["type", "=", 1]
                                                              ])->get();

        return view('articles', ['articles' => $articles]);
    }

    public function showArticle($title, $id){
        $article = \App\Article::where(function($query) {
          $query->where('type','=','1')
            ->orWhere('type','=','3');
      })->findOrFail($id);

        return view('showArticle', ['article' => $article, 'title' => str_replace('-', ' ', Str::title($title))]);
    }
}