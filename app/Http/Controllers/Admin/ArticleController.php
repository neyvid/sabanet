<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Attachment\AttachmentType;
use App\Repositories\ArticleRepository\ArticleRepository;
use App\Repositories\AttachmentRepository\AttachmentRepository;
use App\Services\Upload\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }

    public function index()
    {
        $title = 'لیست مقاله های';
        return view('admin.article.index', compact('title'));
    }

    public function create()
    {
        $title = 'ایجاد مقاله جدید';
        return view('admin.article.create', compact('title'));
    }

    public function store(Request $request)
    {
        $articleCreated = $this->articleRepository->create([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
        ]);
        if ($articleCreated && $articleCreated instanceof Article) {
            $articlePicture=$request->file('picture');
            $whiteList = config('upload.whitelist');
            if($request->hasFile('picture') && in_array($articlePicture->getClientMimeType(),$whiteList)){
                $newfile=UploadService::image($articlePicture);
                $attachmentRepository = new AttachmentRepository();
                $createAttachment = $attachmentRepository->create([
                    'type' => AttachmentType::IMAGE,
                    'name' => $newfile['name'],
                    'size' => $newfile['size'],
                ]);
                $articleCreated->attachments()->sync($createAttachment->id);
            }

            return redirect()->back()->with('success', 'مقاله مورد نظر با موفقیت ثبت گردید');
        }

    }


}
