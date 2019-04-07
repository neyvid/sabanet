<?php


namespace App\Repositories\ArticleRepository;



use App\Models\Article\Article;
use App\Repositories\Contract\BaseRepository;

class ArticleRepository extends BaseRepository
{

    public function __construct()
    {
     $this->model=Article::class;
    }
}
