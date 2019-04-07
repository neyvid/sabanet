<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comment;
use App\Repositories\ArticleRepository\ArticleRepository;
use App\Repositories\CommentRepository\CommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $commentRepository;
    protected $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
        $this->commentRepository = new CommentRepository();
    }

    public function store(Request $request)
    {

        $articleId = $request->article_id;
        $currentArticle = $this->articleRepository->find($articleId);
        $commentbody = $request->comment;
        $comment = new Comment();
        $comment->body = $commentbody;
        $comment->parent_id = $request->comment_parent;
        $comment->user_id = Auth::user()->id;
        $result = $currentArticle->comments()->save($comment);
        if ($request && $result instanceof Comment) {
            return back()->with('success', 'نظر شما با موفقیت ثبت گردید، بعد از تایید توسط مدیریت در سایت منتشر خواهد شد!');
        }
    }
}
