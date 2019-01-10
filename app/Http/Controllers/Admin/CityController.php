<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StateCreate;
use App\Models\City;
use App\Repositories\CityRepository\CityRepository;
use App\Repositories\StateRepository\StateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    protected $cityRepository;
    protected $stateRepository;

    public function __construct()
    {
        $this->cityRepository = new CityRepository();
        $this->stateRepository = new StateRepository();
    }

    public function index()
    {
        $title = 'لیست شهرها';
        $cities = $this->cityRepository->all();
        return view('admin.city.index', compact('cities', 'title'));
    }

    public function create()
    {
        $title = 'ایجادشهر جدید';
        $states=$this->stateRepository->all();
        return view('admin.city.create', compact('title','states'));

    }

    public function store(StateCreate $request)
    {
        $cityName = $request->input('name');
        $cityCreate = $this->stateRepository->create([
            'name' => $cityName
        ]);
        if ($cityCreate && $cityCreate instanceof City) {
            return redirect()->back()->with('success', 'شهر مورد نظر شما با موفقیت ثبت گردید');
        }
    }

    public function destroy()
    {

    }

    public function edit(Request $request)
    {
        $title = 'ویرایش';
        $cities = $this->cityRepository->find($request->input('item'));
        return view('admin.city.edit', compact('cities', 'title'));
    }

    public function update(Request $request)
    {
        $itemIdForupdate = $request->input('item');
        $update = $this->cityRepository->update($itemIdForupdate,
            [
                'name' => $request->input('name')
            ]);
        if ($update) {
            return redirect()->route('profile.city.list')->with('success', 'ویرایش با موفقیت انجام شد.');
        }
    }
}
