<?php

namespace App\Models\Article;

use App\Models\Attachment;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded=['id'];

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
    public function attachments()
    {
        return $this->morphToMany(Attachment::class, 'attachable');
    }

}
