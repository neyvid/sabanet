<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AttachmentRepository\AttachmentRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttachmentController extends Controller
{
    public $attachmentRepository;

    public function __construct()
    {
        $this->attachmentRepository = new AttachmentRepository();
    }

    public function index()
    {
        $title = 'گالری فایل های سیستم';
        $attachments = $this->attachmentRepository->all();
        return view('admin.attachment.index', compact('attachments', 'title'));

    }

    public function destroy(Request $request)
    {
        $itemId = $request->item;
        $item=$this->attachmentRepository->find($itemId);
        $deleteItem = $this->attachmentRepository->delete($itemId);
        if ($deleteItem) {
            File::delete(public_path('media/') . $item->name);

            return redirect()->back()->with('success', 'فایل مورد نظر با موفقیت حذف گردید');
        }

    }
}
