<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateCreate;
use App\Models\State;
use App\Repositories\StateRepository\StateRepository;
use Illuminate\Http\Request;

class StateController extends Controller
{
    protected $stateRepository;

    public function __construct()
    {
        $this->stateRepository = new StateRepository();
    }

    public function index()
    {
        $title = 'لیست استان ها';
        $states = $this->stateRepository->all();
        return view('admin.state.index', compact('states', 'title'));
    }

    public function create()
    {
        $title = 'ایجاد استان جدید';
        return view('admin.state.create', compact('title'));

    }

    public function store(StateCreate $request)
    {
        $stateName = $request->input('name');
        $stateCode = $request->input('code');
        $stateCreate = $this->stateRepository->create([
            'name' => $stateName,
            'code' => $stateCode
        ]);
        if ($stateCreate && $stateCreate instanceof State) {
            return redirect()->back()->with('success', 'استان مورد نظر شما با موفقیت ثبت گردید');
        }

    }

    public function edit(Request $request)
    {
        $title = 'ویرایش';
        $state = $this->stateRepository->find($request->input('item'));
        return view('admin.state.edit', compact('state', 'title'));

    }

    public function update(StateCreate $request)
    {
        $itemIdForupdate = $request->input('item');
        $update = $this->stateRepository->update($itemIdForupdate,
            [
                'name' => $request->input('name'),
                'code' => $request->input('code')
            ]);
        if ($update) {
            return redirect()->route('profile.state.list')->with('success', 'ویرایش با موفقیت انجام شد.');
        }
    }

    public function destroy(Request $request)
    {
        $itemId = $request->input('item');

        $deletItem = $this->stateRepository->delete($itemId);
        if ($deletItem) {
            return redirect()->back()->with('success', 'شهر مورد نظربا موفقیت حذف گردید');
        }
    }
}
