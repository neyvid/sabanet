<?php


namespace App\Repositories\AttachmentRepository;


use App\Models\Attachment;
use App\Repositories\Contract\BaseRepository;

class AttachmentRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model=Attachment::class;
    }

}
