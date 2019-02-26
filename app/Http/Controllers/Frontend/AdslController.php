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
use App\Services\CalculateTotalPrice\calculateTotalPrice;
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
//        check telnumber that comming (validation)
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
//        session(['opratorId' => $opratorId]);
        session(['opratorId' => $oprator->name]);
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
        if(!session()->has(['areacode','clientNumber'])){
            return redirect()->route('checkSupport');

        }
        if (!session()->has('service')) {
            return redirect()->route('checkSupport')->with('warning', 'لطفا ابتدا یکی از سرویس ها را انتخاب نمایید');
//            return redirect()->back()->with('warning', 'لطفا ابتدا یکی از سرویس ها را انتخاب نمایید');
        }
        $productRepository = new ProductRepository();
        $productsForNetwork = $productRepository->all()->where('product_type', ProductType::NETWORK_EQUIPMENT);
        $productsForPc = $productRepository->all()->where('product_type', ProductType::PC_EQUIPMENT);
        return view('frontend.adsl.step2', compact('productsForNetwork', 'productsForPc'));

    }

    public function addEquipmentForUser(Request $request)
    {
//        $productId = $request->equipmentId;
//        if(session()->has('products.'.$productId)){
//            session()->forget(['products.'.$productId]);
//
//        }else{
////            session()->forget(['products.'.[$productId]]);
//            $productRepository = new ProductRepository();
//            $product = $productRepository->find($productId);
//            session(['products.'.$productId=>$product]);
//        }
//

//        if ($request->equipmentId == session('product')['id']) {
//            session()->forget('product'.[$request->equipmentId]);
//        } else {
//            session()->forget($request->equType);
//            $productId = $request->equipmentId;
//            $productRepository = new ProductRepository();
//            $product = $productRepository->find($productId);
//            session(['products'.$request->equipmentId => $product]);
////            session([$request->equType => $product]);
//        }

//        return session()->all();
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
        if(!session()->has(['areacode','service','clientNumber'])){
            return redirect()->route('checkSupport');
        }
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


    public function typeselection(Request $request)
    {
        if ($request->userType == 1 && Auth::user()->companyName == null) {
            return redirect()->back()->with('warning', 'درخواست خرید برای سازمان و یا شرکت نیاز به ثبت اطلاعات شرکت دارد، لطفا از لینک زیر ابتدا اطلاعات شرکت خود را ثبت نمایید.');
        }
        return redirect()->route('orderControllerShow', ['userType' => $request->userType]);
    }

    public function typeselectionAjax(Request $request)
    {
        if ($request->userType == 1 && Auth::user()->companyName == null) {
            $viewOfError = \view('frontend.adsl.buyTypeView.showCompanyError')->render();
            return $viewOfError;
        } else {
            $vieOfCompanyDetail = \view('frontend.adsl.buyTypeView.showCompanyDetail')->render();
            return $vieOfCompanyDetail;
        }

    }

    public function ordercontroller(Request $request)
    {
        $userType = $request->userType;  //0 is normal and 1 is company
        if (session()->has(['areacode', 'clientNumber', 'opratorId', 'service'])) {
            if (session()->has('userType')) {
                session()->forget('userType');
            }
            session(['userType' => $userType]);
            return redirect()->route('orderReviewShow');
        }
        return redirect()->route('checkSupport')->with('warning', 'خطایی رخ داده است لطفا مجددا سعی نمایید');
    }


    public function orderReview()
    {
        if(!session()->has(['areacode','clientNumber','service','userType'])){
            return redirect()->route('checkSupport');
        }
        $equpments=calculateTotalPrice::checkIsEquipmentInOrder();
        $buyType = session()->get('userType'); //0 is normal and 1 is company
        $service = session()->get('service');
        return view('frontend.adsl.step4', compact('equpments', 'service'));

    }

    public function showStep5()
    {
        if(!session()->has(['areacode','clientNumber','service','userType'])) {
            return redirect()->route('checkSupport');

        }
        return view('frontend.adsl.orderContract');
    }

    public function confirmContract(Request $request)
    {
//        Other Method for Session Remove Check (attention) remember me
        if(!session()->has(['areacode','clientNumber','service','userType'])) {
            return redirect()->route('checkSupport');

        }
        if (session()->has('confirmContract')) {
            session()->remove('confirmContract');
        }
        if ($request->confirmContract == 1) {
            session(['confirmContract' => $request->confirmContract]);
            $equpments = calculateTotalPrice::checkIsEquipmentInOrder();
            $priceInfo = calculateTotalPrice::calculateTotalPrice(session('service'), $equpments);
//            return redirect()->route('showStep5');
            return view('frontend.adsl.step5',compact('priceInfo'));
        } else {
            return redirect()->back()->with('warning', 'برای ادامه می بایست حتما قرار داد را مطالعه نمایید و آنرا تایید کنید');
        }
    }
    public function deletesession(){
        session()->forget(['areacode', 'clientNumber', 'opratorId', 'service', 'net-equ', 'pc-equ','userType','confirmContract']);

    }
}
