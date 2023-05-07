<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $data = Article::latest()->paginate(5);
        
        return view('articles.index',[
            'articles' => $data
        ]);
    }

    public function detail($id){
        $data = Article::find($id);

        return view('articles.detail', [
            'article' => $data
        ]);
    }

    public function add(){

        $categories = [
            [ "id" => 1, "name" => "News" ],
            [ "id" => 2, "name" => "Tech" ],
            ];

        return view('articles.add', [
            'categories' => $categories
        ]);
    }

    public function create(){

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
        
        return redirect('/articles');
    }


    public function delete($id){

        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('info', 'Article deleted');
    }

    public function edit($id){

        $categories = [
            [ "id" => 1, "name" => "News" ],
            [ "id" => 2, "name" => "Tech" ],
            ];

        $article = Article::find($id);
        return view('articles.edit',[
            'article' => $article,
            'categories' => $categories
        ]);
    }

    public function update($id){

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
        
        return redirect('/articles');
    }


}