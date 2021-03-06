<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{Frontend, Gallery, Category, Article};

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontend = Frontend::all()->first();
        $articles = Article::orderBy('created_at', 'desc')->paginate(3);

        return view('landing-page.home', compact('frontend', 'articles'));
    }

    public function categoryArticle($category) {
        $category = Category::where('name', $category)->first();
        $articles = Article::orderBy('created_at', 'desc')->paginate(3);

        $articles = $category->articles;

        return view('frontend.article.categories', compact('articles'));
    }

    public function gallery() {
        $galleries = Gallery::all();

        return view('frontend.gallery.index', compact('galleries'));
    }

    public function article(Request $request) {    
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);

        return view('frontend.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(4);
        $articles = Article::whereNotIn('id', array($article->id))->get();
        $latest_article = Article::latest()->first();

        return view('frontend.article.show', compact('article', 'galleries', 'articles', 'latest_article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
