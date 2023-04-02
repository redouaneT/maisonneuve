<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::SimplePaginate(10);
        return view('template/adminlte/articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template/adminlte/articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article = new Article($request->all());
        $article->user_id = Auth::user()->id;
        $article->save();

        return redirect(route('articles.index'))->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

        return view('template/adminlte/articles.show', ['article' => $article]);
    }

    /**
     * Display all the article by a specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function myArticles()
    {
        $user = auth()->user();
        $articles = $user->articles;
        return view('template/adminlte/articles.my', ['articles' => $articles]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('update-article', $article);
        return view('template/adminlte/articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize('update-article', $article);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article->update($request->all());

        return redirect(route('articles.show', $article))->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('update-article', $article);

        $article->delete();

        return redirect(route('articles.index'))->with('success', 'Article deleted successfully');
    }
}
