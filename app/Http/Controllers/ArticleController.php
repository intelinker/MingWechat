<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;

class ArticleController extends Controller
{
    public $app;

    /**
     * ArticleController constructor.
     */
    public function __construct(Application $wechat)
    {
        $this->app = $wechat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = $this->app->material->lists('news', 0, 10);
//        foreach ($lists as $articles)
//            foreach ($articles as $article)
//                foreach ($article as $art)
//                    dd($lists['item']);
//        $articles = Article::orderBy('created_at', 'desc')->paginate(15);
//        $totalArticle = Article::count();
        return view('articles/index', ['articles'=>$lists['item']]);//, 'totalArticle'=>$totalArticle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles/create');
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
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
