<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Http\Requests\ArticleRequest;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

 //コンストラクタ
  public function __construct()
  {
      $this->authorizeResource(Article::class, 'article');
  }

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
    //タグの自動補完のために、全てのタグ情報をBladeに渡す
    $allTagNames = Tag::all()->map(function ($tag) {
        return ['text' => $tag->name];
    });

    return view('articles.create', [
        'allTagNames' => $allTagNames,
    ]);
  }

  public function store(ArticleRequest $request, Article $article)
  {
      $article->title = $request->title;
      $article->body = $request->body;
      $article->user_id = $request->user()->id;
      $article->save();

      $request->tags->each(function ($tagName) use ($article) {
          $tag = Tag::firstOrCreate(['name' => $tagName]);
          $article->tags()->attach($tag);
      });

      return redirect()->route('articles.index');
  }

  public function edit(Article $article)
  {
    //tagの変更も含めたedit画面
    $tagNames = $article->tags->map(function ($tag) {
      return ['text' => $tag->name];
    });

    $allTagNames = Tag::all()->map(function ($tag) {
        return ['text' => $tag->name];
    });

    return view('articles.edit', [
        'article' => $article,
        'tagNames' => $tagNames,
        'allTagNames' => $allTagNames,
    ]);
  }

  public function update(ArticleRequest $request, Article $article)
  {
      $article->fill($request->all())->save();
      //記事の編集画面からタグの編集(一度detachして、attachする流れ)
      $article->tags()->detach();
      $request->tags->each(function ($tagName) use ($article) {
          $tag = Tag::firstOrCreate(['name' => $tagName]);
          $article->tags()->attach($tag);
      });
      return redirect()->route('articles.index');
  }

  public function destroy(Article $article)
  {
      $article->delete();
      return redirect()->route('articles.index');
  }

  public function show(Article $article)
  {
      return view('articles.show', ['article' => $article]);
  }

  public function like(Request $request, Article $article)
  {
      $article->likes()->detach($request->user()->id);
      $article->likes()->attach($request->user()->id);

      return [
          'id' => $article->id,
          'countLikes' => $article->count_likes,
      ];
  }

  public function unlike(Request $request, Article $article)
  {
      $article->likes()->detach($request->user()->id);

      return [
          'id' => $article->id,
          'countLikes' => $article->count_likes,
      ];
  }

}
