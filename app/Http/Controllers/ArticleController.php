<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;

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

  public function store(ArticleRequest $request, Article $article)
  {
      $article->title = $request->title;
      $article->body = $request->body;
      $article->user_id = $request->user()->id;
      $article->save();
      return redirect()->route('articles.index');
  }

}
