<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\userEditInfo;
use App\Models\User;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index()
    {
        $title = 'حساب کاربری شما';
        $user = Auth::user();
        return view('admin.user.index', compact('user', 'title'));
    }

    public function edit()
    {
        $title = 'ویرایش اطلاعات کاربری';
        $user = Auth::user();
        return view('admin.user.edit', compact('user', 'title'));
    }

    public function update(userEditInfo $request)
    {

        $checkUserIsExist = $this->userRepository->all()->except(Auth::user()->id);
        $findUserWithThisEmail = $checkUserIsExist->where('email', $request->email);
        $fineUserWithThisMobile = $checkUserIsExist->where('mobile', $request->mobile);
//       check in db is field with this email or mobile that user input
        if (count($findUserWithThisEmail) == 0 && count($fineUserWithThisMobile) == 0) {
            $update = $this->userRepository->update(Auth::id(), [
                'name' => $request->name,
                'lastname' => $request->lastname,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'codemeli' => $request->codemeli,
                'address' => $request->address,

            ]);
            if ($request->has('isCompany')) {
                $update = $this->userRepository->update(Auth::id(), [
                    'companyName' => $request->companyName,
                    'economyCode' => $request->economyCode,
                    'nationalCode' => $request->nationalCode,
                    'registerNumber' => $request->registerNumber,
                    'connectorName' => $request->connectorName,
                    'connectorLastname' => $request->connectorLastname,
                    'connectorMobile' => $request->connectorMobile,
                    'connectorCodeMeli' => $request->connectorCodeMeli,
                    'connectorEmail' => $request->connectorEmail,
                    'companyAddress' => $request->companyAddress,
                ]);
            }
            if ($update) {
                return redirect()->intended();
            }
        }
        return redirect()->back()->with('warning', 'قبلا با این موبایل و یا ایمیل در سیستم ثبت نام کرده اید');


    }


    public function logOut()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
