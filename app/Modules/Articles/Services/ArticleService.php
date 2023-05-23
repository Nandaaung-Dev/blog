<?php

namespace App\Modules\Articles\Services;

use App\Modules\Articles\Models\Article;

class ArticleService
{
    public function getAll()
    {
        $articles = Article::latest()->paginate(5);

        return $articles;
    }

    public function show($id)
    {
        $article = Article::find($id);
        return $article;
    }

    public function store($request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;
        $article->category_id = $request->category_id;
        $article->save();
    }

    public function update($request, $article)
    {
        $article->title = $request->title;
        $article->body = $request->body;
        $article->category_id = $request->category_id;
        $article->save();
    }
}
