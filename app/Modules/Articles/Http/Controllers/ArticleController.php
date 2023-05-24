<?php

namespace App\Modules\Articles\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Articles\Http\Requests\CreateArticleRequest;
use App\Modules\Articles\Http\Requests\UpdateArticleRequest;
use App\Modules\Articles\Models\Article;
use App\Modules\Articles\Services\ArticleService;
use App\Modules\Categories\Models\Category;


class ArticleController extends Controller
{
    private $articleService;
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // dd($this->articleService->getAll());
        return view('articles.index', [
            'articles' => $this->articleService->getAll()
        ]);
    }

    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $this->articleService->show($article->id)
        ]);
    }

    public function create()
    {
        return view('articles.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(CreateArticleRequest $createArticleRequest)
    {
        $createArticleRequest->validated();

        $this->articleService->store($createArticleRequest);

        return redirect()->route('articles.index')->with('info', 'Article created');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $this->articleService->show($article->id),
            'categories' => Category::all(),
        ]);
    }

    public function update(UpdateArticleRequest $updateArticleRequest, Article $article)
    {
        $updateArticleRequest->validated();

        $this->articleService->update($updateArticleRequest, $article);

        return redirect()->route('articles.index')->with('info', 'Article Updated');
    }

    public function destroy(Article $article)
    {

        $article->delete();

        return redirect()->route('articles.index')->with('info', 'Article deleted');
    }
}
