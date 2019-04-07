<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article\Article;
use App\Models\Comment;
use App\Repositories\ArticleRepository\ArticleRepository;
use App\Repositories\CommentRepository\CommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    protected $articleRepository;
    protected $commentRepository;


    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->commentRepository = new CommentRepository();
    }

    public function index(Request $request)
    {
        $articleId = $request->articleId;
        $article = $this->articleRepository->find($articleId);
        $comments=$article->comments->groupBy('parent_id');

        if($article && $article instanceof Article){
            return view('frontend.article.article', compact('article','comments'));
        }
        return abort(404);
    }
}
