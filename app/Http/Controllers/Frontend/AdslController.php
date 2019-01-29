<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\CheckAdsl;
use App\Repositories\areadcodeRepository\AreacodeRepository;
use App\Repositories\CityRepository\CityRepository;
use App\Repositories\opratorRepository\OpratorRepository;
use App\Repositories\ProductRepository\ProductRepository;
use App\Repositories\ServiceRepository\ServiceRepository;
use App\Repositories\StateRepository\StateRepository;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function index()
    {
        $states = $this->stateRepository->all();
        return view('frontend.adsl.register_adsl_form', compact('states'));

    }

    public function getCityFromStateId(int $stateId)
    {
        $currentState = $this->stateRepository->find($stateId);
        $cities = $currentState->cities;
        $citiesHtml = view('frontend.adsl.showCities.cities', compact('cities'))->render();
        return $citiesHtml;
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

    public function checkAdslSupportWithStateAndCity(Request $request)
    {
        $cityId = $request->city;
        $stateId = $request->state;
        $telNumber = $request->telNumber;
        $areacode = substr($telNumber, 0, 4);
        $check = $this->areaCodeRepository->findBy(['city_id' => $cityId, 'state_id' => $stateId, 'areacode' => $areacode]);
        if (!$check) {
            return redirect()->back()->with('warning', 'چنین پیش شماره ای در این شهر و استان موجود نمی باشد');
        }
        if (session()->has('areacode')) {
            session()->forget('areacode');
        }
        session(['areacode' => $check]);
        return view('frontend.adsl.registerProcess');
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
        if (session()->has('service')) {
            session()->forget('service');
        }
        session(['service' => $service]);
        $productRepository=new ProductRepository();

        $viewOfProducts= view('frontend.adsl.showproducts',compact('products'))->render();
        return $viewOfProducts;

    }
}

