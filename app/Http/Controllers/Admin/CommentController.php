<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment\CommentStatus;
use App\Repositories\CommentRepository\CommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminCommentController extends Controller
{
    protected $commentRepository;

    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
    }

    public function index()
    {
        $title = 'لیست دیدگاه های کاربران';
        $comments = $this->commentRepository->all([], 'id', 'desc');
        return view('admin.comment.index', compact('title', 'comments'));
    }
    public function commentOfUser()
    {
        $title = 'لیست دیدگاه های من';
        $comments = $this->commentRepository->all([], 'id', 'desc')->where('user_id',Auth::user()->id);
        return view('admin.comment.admin.index', compact('title', 'comments'));
    }

    public function search(Request $request)
    {
        $title = 'لیست دیدگاه های کاربران';
        $searchValue = $request->searchValue;
        $comments = $this->commentRepository->search($searchValue, 'body');
        return view('admin.comment.index', compact('title', 'comments'));

    }

    public function changeStatus(int $status)
    {
        $currentComment = $this->commentRepository->find($status);
        if ($currentComment->status == CommentStatus::ACTIVE) {
            $currentComment->status = 0;
        } else {
            $currentComment->status = 1;
        }
        $currentComment->save();
        return back();
    }

    public function actionAll(Request $request)
    {
        $action = $request->action;
        $items = $request->check;
        switch ($action) {
            case 'delete':
                $this->commentRepository->deleteAll($request->check);
                break;
            case 'confirm':
                if (isset($items)) {
                    $this->commentRepository->confirmAll($items);
                }
                return back();
                break;
            case 'unConfirm':
                if (isset($items)) {
                    $this->commentRepository->unConfirmAll($items);
                }
                return back();
                break;
        }
    }

    public function destroy(Request $request)
    {
        $deleteItem = $this->commentRepository->delete($request->item);
        if ($deleteItem) {
            return redirect()->back()->with('success', 'دیدگاه مورد نظر حذف گردید');
        }
    }

    public function edit(Request $request)
    {
        $title = 'ویرایش متن دیدگاه';
        $comment = $this->commentRepository->find($request->item);
        return view('admin.comment.edit', compact('comment', 'title'));
    }

    public function update(Request $request)
    {
        $itemId = $request->item;
        $commentUpdate = $this->commentRepository->update($itemId, [
            'body' => $request->body
        ]);
        if($commentUpdate){
            return redirect()->route('profile.comments.list')->with('success', 'ویرایش با موفقیت انجام شد.');

        }
    }

}
