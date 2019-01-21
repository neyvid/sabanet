<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreacodeRegister;
use App\Models\Areacode;
use App\Repositories\areadcodeRepository\AreacodeRepository;
use App\Repositories\CityRepository\CityRepository;
use App\Repositories\opratorRepository\OpratorRepository;
use App\Repositories\StateRepository\StateRepository;
use Illuminate\Http\Request;

class AreacodeController extends Controller
{
    protected $areacodeRepository;
    protected $opratorRepositry;
    protected $cityRepositry;
    protected $stateRepositoy;

    public function __construct()
    {
        $this->areacodeRepository = new AreacodeRepository();
        $this->opratorRepositry = new OpratorRepository();
        $this->cityRepositry = new CityRepository();
        $this->stateRepositoy = new StateRepository();
    }

    public function index()
    {
        $title = 'لیست پیش شماره ها';
        $areacodes = $this->areacodeRepository->all();
        return view('admin.areacode.index', compact('areacodes', 'title'));
    }


    public function create()
    {
        $title = 'تعریف پیش شماره جدید';
        $oprators = $this->opratorRepositry->all();
        $states = $this->stateRepositoy->all();
        return view('admin.areacode.create', compact('title', 'oprators', 'states'));
    }

    public function store(AreacodeRegister $request)
    {
        $checkIsExistThisItem = $this->areacodeRepository->all()->where('code', $request->code)->where('areacode', $request->areacode);
        if ($checkIsExistThisItem->count() != 0) {
            return redirect()->back()->with('warning', 'این پیش شماره قبلا برای این کد استان ثبت گردیده است');
        };
        //check entry code of state with state selected before save
        $stateSelected = $this->stateRepositoy->find($request->state);
        if ($stateSelected->code != $request->code) {
            return redirect()->back()->with('warning', 'کد وارد شده برای استان انتخاب شده معتبر نمی باشد');
        }

        $areacodeCreate = $this->areacodeRepository->create([
            'state_id' => $request->state,
            'city_id' => $request->city,
            'telecomcenter_id' => $request->telecomcenter,
            'areacode' => $request->areacode,
            'code' => $request->code,
        ]);
        $areacodeCreate->oprators()->attach($request->oprators);
        if ($areacodeCreate) {
            return redirect()->back()->with('success', 'پیش شماره مورد نظر با موفقیت ثبت گردید');
        }
    }


    public function edit(Request $request)
    {
        $title = 'ویرایش';
        $oprators = $this->opratorRepositry->all();
        $states = $this->stateRepositoy->all();
        $areacode = $this->areacodeRepository->find($request->item);
        if (isset($areacode)) {
            return view('admin.areacode.edit', compact('areacode', 'title', 'oprators', 'states'));
        }
        return abort(404);  //create custom error page for this request

    }

    public function update(AreacodeRegister $request)
    {
        $itemIdForupdate=$this->areacodeRepository->find($request->item);

//        $checkIsExistThisItem = $this->areacodeRepository->all()->where('code', $request->code)->where('areacode', $request->areacode);
//        if ($checkIsExistThisItem->count() != 0) {
//
//            return redirect()->back()->with('warning', 'این پیش شماره قبلا برای این کد استان ثبت گردیده است');
//        };
        //check entry code of state with state selected before save
        $stateSelected = $this->stateRepositoy->find($request->state);
        if ($stateSelected->code != $request->code) {
            return redirect()->back()->with('warning', 'کد وارد شده برای استان انتخاب شده معتبر نمی باشد');
        };
        $areaCodeUpdate = $this->areacodeRepository->update($itemIdForupdate->id,[
            'state_id' => $request->state,
            'city_id' => $request->city,
            'telecomcenter_id' => $request->telecomcenter,
            'areacode' => $request->areacode,
            'code' => $request->code,
        ]);
        $itemIdForupdate->oprators()->sync($request->oprators);
        if ($areaCodeUpdate) {
            return redirect()->back()->with('success', 'پیش شماره مورد نظر با موفقیت بروزرسانی گردید');
        }
    }


    public function destroy(Request $request)
    {
        $itemIdForDelete=$request->item;
        $itemDeleted=$this->areacodeRepository->delete($itemIdForDelete);
        if($itemDeleted){
            return redirect()->back()->with('success','پیش شماره موردنظرباموفقیت حذف گردید');
        }
    }
}
