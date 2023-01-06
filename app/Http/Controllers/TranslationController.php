<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class TranslationController extends Controller
{
    
    //needs to be amended



	/**
	 * type == 1 stands for article.
     * type == 2 stand for translation
	 */
    public function show (){
        $articles = \App\Article::orderBy('id','DESC')->where([
                                                                ["publish_date", "<", Carbon::now()], 
                                                                ["type", "=", 2]
                                                              ])->get();

        return view('translations', ['articles' => $articles]);
    }

    public function showTranslation($title, $id){
        $article = \App\Article::where([
            ["type", "=", 2]
          ])->findOrFail($id);

        return view('showArticle', ['article' => $article, 'title' => str_replace('-', ' ', Str::title($title))]);
    }

}