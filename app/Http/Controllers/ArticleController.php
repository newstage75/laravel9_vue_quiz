<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
  //==========ここから追加==========
public function index()
{
    //記事モデルの記事情報をビューに渡す
    $articles = Article::all()->sortByDesc('created_at');

    return view('articles.index', ['articles' => $articles]);
  }
  //==========ここまで追加==========

  public function create()
  {
      return view('articles.create');
  }

}
