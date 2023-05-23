<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Modules\Categories\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $data = Article::latest()->paginate(5);

        return view('articles.index', [
            'articles' => $data
        ]);
    }

    public function show($id)
    {
        $data = Article::find($id);

        return view('articles.show', [
            'article' => $data
        ]);
    }

    public function create()
    {

        // $categories = Category::all();
        return view('articles.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {

        $validator = validator(request()->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article = new Article();
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect('/articles')->with('info', 'Article created');
    }


    public function destroy($id)
    {

        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('info', 'Article deleted');
    }

    public function edit($id)
    {

        // $categories = [
        //     ["id" => 1, "name" => "News"],
        //     ["id" => 2, "name" => "Tech"],
        // ];


        $article = Article::find($id);
        return view('articles.edit', [
            'article' => $article,
            'categories' => Category::all(),
        ]);
    }

    public function update($id)
    {

        $validator = validator(request()->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article = Article::find($id);
        // return $article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect('/articles')->with('info', 'Article Updated');
    }
}
