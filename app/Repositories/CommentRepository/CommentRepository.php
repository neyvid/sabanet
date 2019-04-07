<?php


namespace App\Repositories\CommentRepository;


use App\Models\Comment;
use App\Repositories\Contract\BaseRepository;
use Illuminate\Support\Facades\DB;

class CommentRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = Comment::class;
    }

    public function confirmAll(array $items)
    {
        foreach ($items as $item) {
            $comment = $this->model::find($item);
            $comment->status = Comment\CommentStatus::ACTIVE;
            $comment->save();
        }

    }

    public function unConfirmAll(array $items)
    {
        foreach ($items as $item) {
            $comment = $this->model::find($item);
            $comment->status = Comment\CommentStatus::DEACTIVE;
            $comment->save();
        }

    }



}
