<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Telecomcenter;
use App\Repositories\CityRepository\CityRepository;
use App\Repositories\telecomCenterRepository\TelecomeCenterRepository;
use Illuminate\Http\Request;

class TelecomcenterController extends Controller
{
    protected $telecomCenterRepository;
    protected $cityRepository;

    public function __construct()
    {
        $this->telecomCenterRepository = new TelecomeCenterRepository;
        $this->cityRepository = new CityRepository();
    }

    public function index()
    {
        $telecomeCenters = $this->telecomCenterRepository->all();
        $title = 'لیست مراکز مخابراتی';
        return view('admin.telecomcenter.index', compact('telecomeCenters', 'title'));
    }

    public function create()
    {
        $title = 'ایجاد مرکزمخابراتی جدید';
        $cities = $this->cityRepository->all();
        return view('admin.telecomcenter.create', compact('title', 'cities'));

    }

    public function store(Request $request)
    {
        $cityIdOfTelecome = $request->input('city');
        $telecomeName = $request->input('name');
        $telecomeCreate = $this->telecomCenterRepository->create([
            'name' => $telecomeName,
            'city_id' => $cityIdOfTelecome
        ]);
        if ($telecomeCreate && $telecomeCreate instanceof Telecomcenter) {
            return redirect()->back()->with('success', 'مرکز مخابرات با موفقیت ثبت گردید');
        }
    }

    public function edit(Request $request)
    {
        $title = 'ویرایش مرکزمخابرات';
        $telecomeCenter = $this->telecomCenterRepository->find($request->input('item'));
        $cities = $this->cityRepository->all();
        return view('admin.telecomcenter.edit', compact('telecomeCenter', 'cities', 'title'));
    }

    public function update(Request $request)
    {
        $itemIdForUpdate = $request->input('item');
        $update = $this->telecomCenterRepository->update($itemIdForUpdate, [
            'name' => $request->input('name'),
            'city_id' => $request->input('city')
        ]);
        if ($update) {

            return redirect()->back()->with('success', 'مرکزمخابرات مورد نظر با موفقیت بروزرسانی گردید');
        }
    }

    public function destroy(Request $request)
    {
        $itemIdForDelete = $request->input('item');
        $deleted = $this->telecomCenterRepository->delete($itemIdForDelete);
        if ($deleted) {
            return redirect()->back()->with('success', 'مرکزمخابرات مورد نظر با موفقیت حذف گردید');
        }
    }

    public function getTelecomBycityId(int $cityId)
    {
        $telecomCenters=$this->telecomCenterRepository->all()->where('city_id',$cityId);
        $htmForShowTelecom=view('admin.areacode.showtelecomcenter.telecomecenters',compact('telecomCenters'))->render();
        return $htmForShowTelecom;
    }
}
