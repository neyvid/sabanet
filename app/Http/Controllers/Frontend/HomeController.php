<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article\ArticleStatus;
use App\Repositories\ArticleRepository\ArticleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $articleRepository;
    public function __construct()
    {
        $this->articleRepository=new ArticleRepository();
    }
    public function index()
    {
        $articles=$this->articleRepository->all()->where('status',ArticleStatus::ACTIVE);
        return view('frontend.home',compact('articles'));
    }

    public function showPage()
    {
        return view('frontend.page');

    }

}
