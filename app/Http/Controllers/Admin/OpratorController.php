<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Oprator;
use App\Repositories\opratorRepository\OpratorRepository;
use Illuminate\Http\Request;

class OpratorController extends Controller
{
    protected $opratorRepository;

    public function __construct()
    {
        $this->opratorRepository = new OpratorRepository();
    }

    public function index()
    {
        $title = 'لیست اپراتور ها';
        $oprators = $this->opratorRepository->all();
        return view('admin.oprator.index', compact('oprators', 'title'));
    }

    public function create()
    {
        $title = 'ایجاد اپراتور جدید';
        return view('admin.oprator.create', compact('title'));
    }


    public function store(Request $request)
    {
        $opratorCreate = $this->opratorRepository->create([
            'name' => $request->input('name')
        ]);
        if ($opratorCreate) {
            return redirect()->back()->with('success', 'اپراتور مورد نظر با موفقیت ثبت گردید');
        }
    }


    public function edit(Request $request)
    {
        $title='ویرایش اپراتور';
        $oprator=$this->opratorRepository->find($request->input('item'));
        return view('admin.oprator.edit',compact('title','oprator'));
    }

    public function update(Request $request)
    {
        $itemIdForUpdate=$request->input('item');
        $update=$this->opratorRepository->update($itemIdForUpdate,[
            'name'=>$request->input('name')
        ]);
        if($update){
            return redirect()->back()->with('success','اپراتور مورد نظر با موفقیت بروزرسانی شد');
        }
    }

    public function destroy(Request $request)
    {
        $itemIdForDelete=$request->input('item');
        $deleted=$this->opratorRepository->delete($itemIdForDelete);
        if($deleted){
            return redirect()->back()->with('success','اپراتور مورد نظر با موفقیت حذف گردید');

        }
    }
}
