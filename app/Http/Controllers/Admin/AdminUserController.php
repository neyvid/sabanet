<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index()
    {
        $title = 'لیست کاربران ';
        $allUser = $this->userRepository->all();
        return view('admin.user.admin.index', compact('title', 'allUser'));
    }

    public function edit(Request $request)
    {
        $title = 'ویرایش کاربر';
        $user = $this->userRepository->find($request->input('item'));
        return view('admin.user.edit', compact('user', 'title'));

    }

    public function destroy(Request $request)
    {
        $deletedItem = $this->userRepository->delete($request->input('item'));
        if($deletedItem){
            return redirect()->back()->with('success', 'کاربر موردنظرباموفقیت حذف گردید');
        }
    }
}
