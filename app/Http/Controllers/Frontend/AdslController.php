<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\CheckAdsl;
use App\Models\Product\ProductType;
use App\Models\Service;
use App\Repositories\areadcodeRepository\AreacodeRepository;
use App\Repositories\CityRepository\CityRepository;
use App\Repositories\opratorRepository\OpratorRepository;
use App\Repositories\ProductRepository\ProductRepository;
use App\Repositories\ServiceRepository\ServiceRepository;
use App\Repositories\StateRepository\StateRepository;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdslController extends Controller
{
    protected $stateRepository;
    protected $cityRepository;
    protected $areaCodeRepository;

    public function __construct()
    {
        $this->stateRepository = new StateRepository();
        $this->cityRepository = new CityRepository();
        $this->areaCodeRepository = new AreacodeRepository();
    }

    public function registerAdslUser()
    {
//        before go to this route all session of adsl deleting
        session()->forget(['service', 'areacode', 'clientNumber', 'opratorId', 'net-equ', 'pc-equ']);
        $states = $this->stateRepository->all();
        return view('frontend.adsl.registerAdslUser', compact('states'));
    }

    public function getCityFromStateId(int $stateId)
    {
        $currentState = $this->stateRepository->find($stateId);
        $cities = $currentState->cities;
        $citiesHtml = view('frontend.adsl.showCities.cities', compact('cities'))->render();
        return $citiesHtml;
    }

    public function checkAdslSupportWithStateAndCity(Request $request)
    {

        $cityId = $request->city;
        $stateId = $request->state;
        $telNumber = $request->telNumber;
        $areacode = substr($telNumber, 0, 4);
        $clientTelNumber = $telNumber;
        $currentAreacode = $this->areaCodeRepository->findBy(['city_id' => $cityId, 'state_id' => $stateId, 'areacode' => $areacode]);
        if (!$currentAreacode) {
            return redirect()->back()->with('warning', 'چنین پیش شماره ای در این شهر و استان موجود نمی باشد');
        }
        if (session()->has('areacode') && session()->has('clientNumber')) {
            session()->forget(['areacode', 'clientNumber']);
        }
        session(['areacode' => $currentAreacode, 'clientNumber' => $clientTelNumber]);
        return view('frontend.adsl.step1');
    }

    public function showStep1()
    {
        if (!session()->has('opratorId')) {
            return $this->registerAdslUser();
        }
        return view('frontend.adsl.step1');
    }


    public function chekAdslSupport(Request $request)
    {
        $validation = \Illuminate\Support\Facades\Validator::make($request->all(),
            [
                'telNumber' => 'required|regex:/^[1-9]{1}[0-9]{7}$/',
                'stateCode' => 'required|regex:/^[0]{1}[1-9]{2}$/',
            ],
            [
                'telNumber.required' => 'شماره تلفن را وارد نمایید',
                'telNumber.regex' => 'شماره تلفن را بصورت صحیح وارد نمایید(۸رقمی)',
                'stateCode.required' => 'کد استان را وارد نمایید',
                'stateCode.regex' => 'کداستان را بصورت صحیح وارد نمایید',
            ]
        );
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()->all()]);
        }
        $telNumber = $request->telNumber;
        $stateCode = $request->stateCode;
        $areaCodeFromNumber = substr($telNumber, 0, 4);
        $areaCode = $this->areaCodeRepository->findBy(['areaCode' => $areaCodeFromNumber, 'code' => $stateCode]);
        if ($areaCode == null) {
            return '<div class="alert alert-success mt-3 responseOfAdslCheck">متاسفانه شماره مورد نظر شما تحت خدمات هیچ اپراتوری قرار ندارد </div>';
        }
        $adslCheckAnswer = view('frontend.adsl.adslCheck.adslCheckAnswer', compact('areaCode'))->render();
        return $adslCheckAnswer;
    }

    public function showServiceOfOprator(Request $request)
    {
        $opratorId = $request->opratorId;
        $opratorRepository = new OpratorRepository();
        $oprator = $opratorRepository->find($opratorId);
        if (session()->has('opratorId')) {
            session()->forget('opratorId');
        }
        session(['opratorId' => $opratorId]);
        $servicesOfOprator = $oprator->services;
        $serviceView = view('frontend.adsl.showservice', compact('servicesOfOprator'))->render();
        return $serviceView;
    }

    public function addServiceForUser(Request $request)
    {
        $serviceId = $request->serviceId;
        $serviceRepository = new ServiceRepository();
        $service = $serviceRepository->find($serviceId);
        if ($service && $service instanceof Service) {
            if (session()->has('service')) {
                session()->forget('service');
            }
            session(['service' => $service]);
            return 'true';
        }

    }

    public function showEquipmentOFService()
    {
        if (!session()->has('service')) {
            return redirect()->back()->with('warning', 'لطفا ابتدا یکی از سرویس ها را انتخاب نمایید');
        }
        $productRepository = new ProductRepository();
        $productsForNetwork = $productRepository->all()->where('product_type', ProductType::NETWORK_EQUIPMENT);
        $productsForPc = $productRepository->all()->where('product_type', ProductType::PC_EQUIPMENT);
        return view('frontend.adsl.step2', compact('productsForNetwork', 'productsForPc'));

    }

    public function addEquipmentForUser(Request $request)
    {
        if ($request->equipmentId == session($request->equType)['id']) {
            session()->forget($request->equType);
        } else {
            session()->forget($request->equType);
            $productId = $request->equipmentId;
            $productRepository = new ProductRepository();
            $product = $productRepository->find($productId);
            session([$request->equType => $product]);
        }

        return session()->all();
    }

    public function showStep3()
    {
        if (empty(Auth::user()->name)) {
//            return redirect()->route('user.edit');
            return redirect()->route('frontend.user.addinfo');
        }
//        if autheticate is true and name is not empty
        return view('frontend.adsl.step3');
    }

    public function goback(Request $request)
    {
        return view('frontend.adsl.step' . $request->number);
    }
}
