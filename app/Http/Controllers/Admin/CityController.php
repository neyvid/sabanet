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
        $cityCreate = $this->cityRepository->create([
            'name' => $cityName,
            'state_id'=>$request->input('state'),
        ]);
        if ($cityCreate && $cityCreate instanceof City) {
            return redirect()->back()->with('success', 'شهر مورد نظر شما با موفقیت ثبت گردید');
        }
    }

    public function destroy(Request $request)
    {
        $itemId=$request->input('item');
        $deleteItem=$this->cityRepository->delete($itemId);
        if($deleteItem){
            return redirect()->back()->with('success','شهر موردنظرباموفقیت حذف گردید');
        }
    }

    public function edit(Request $request)
    {
        $title = 'ویرایش';
        $city = $this->cityRepository->find($request->input('item'));
        $states=$this->stateRepository->all();
        return view('admin.city.edit', compact('city','states', 'title'));
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

    public function getCityByStateId(int $stateId)
    {
        $cities= $this->cityRepository->all()->where('state_id',$stateId);
        $stateSelected=$this->stateRepository->find($stateId);
        $codeOfThisState=$stateSelected->code;
        $htmForShowCities=view('admin.areacode.showcities.cities',compact('cities'))->render();
        return ['htmForShowCities'=>$htmForShowCities,'code'=>$codeOfThisState];
    }
}
