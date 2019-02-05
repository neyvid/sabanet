<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Requests\UserChangePassword;
use App\Http\Requests\UserRegister;
use App\Mail\sendResetPasswordLink;
use App\Models\Permission\Permissions;
use App\Models\Product;
use App\Models\Roles\Roles;
use App\Models\User;
use App\Repositories\UserRepository\UserRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct()
    {

        $this->userRepository = new UserRepository();
    }

    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('frontend.auth.login');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('frontend.Auth.register');
    }

    public function resetPasswordRequestForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('frontend.auth.resetpasswordrequestform');
    }

    public function sendResetPassEmail(Request $request)
    {
        $authType = $this->authType($request->input('forgotPasswordField'));
        $user = $this->userRepository->findBy([$authType => $request->input('forgotPasswordField')]);
        if ($user && $user instanceof User) {
            DB::table('password_resets')->insert(
                [
                    $authType => $request->input('forgotPasswordField'),
                    'token' => bcrypt(15),
                    'created_at' => Carbon::now()
                ]);
            $currentResetPasswordRequest = DB::table('password_resets')->where($authType, $request->input('forgotPasswordField'))->orderBy('created_at', 'desc')->first();
            if ($currentResetPasswordRequest->email != null) {
                Mail::to($user)->send(new sendResetPasswordLink($user, $currentResetPasswordRequest));
            } else {
                //send sms
            }
        } else {
            return redirect()->back()->with('warning', '!پست الکترونیک یا شماره موبایل وارد شده در سایت ثبت نشده است');
        }

    }

    public function setNewPassword(UserChangePassword $request)
    {
        $currentUserEmail = DB::table('password_resets')->where('token', $request->rtk)->orderBy('created_at', 'desc')->first();
        $authType = $this->authType($currentUserEmail->email);
        $user = $this->userRepository->findBy([$authType => $currentUserEmail->$authType]);
        $user->password = Hash::make($request->password);
        $userSave = $user->save();
        if ($userSave) {
            return redirect()->route('login')->with('success', 'کلمه عبور شما با موفقیت ثبت گردید، هم اکنون می توانید وارد سایت شوید');
        }
    }

    public function ResetPasswordForm()
    {
        return view('frontend.auth.resetpasswordform');
    }

    public function authType(string $field = null)
    {
        $authType = 'mobile';
        if ($field != null) {
            $authType = filter_var($field, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        }
        return $authType;
    }

    public function doRegister(UserRegister $request)
    {
        $registerType = $this->authType($request->input('registerField'));
        $password = Hash::make($request->input('password'));
        $userCheck = $this->userRepository->findBy([$registerType => $request->input('registerField')]);
        if ($userCheck && $userCheck instanceof User) {
            return redirect()->back()->with('warning', 'قبلا با این ایمیل و یاشماره همراه عضو شده‌اید');
        } else {
            $userCreate = $this->userRepository->create([
                $registerType => $request->input('registerField'),
                'password' => $password
            ]);
            $userCreate->assignRole(Roles::USER);
            $userCreate->givePermissionTo(Permissions::USERACCESS);
            Auth::login($userCreate, true);
            return redirect('/');
        }


    }

    public function doLogin(Request $request)
    {
//        Get which login use(Email or Mobile) with filter_var
        $loginType = $this->authType($request->input('loginField'));
        if (Auth::attempt([$loginType => $request->input('loginField'), 'password' => $request->input('password')], $request->has('rememberMe') ? true : false)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('warning', 'اطلاعات کاربری نادرست است');
        }

    }

    public function doLogOut()
    {
        Auth::logout();
        return redirect('/');

    }

//For Initial Role and Permission of System

    public function CreateRole()
    {
        Role::create(['name' => Roles::MANAGER]);
        Role::create(['name' => Roles::SUPPORTER]);
        Role::create(['name' => Roles::USER]);
    }

    public function CreatePermission()
    {
        Permission::create(['name' => Permissions::TOTALACCESS]);
        Permission::create(['name' => Permissions::SUPPORTERACCESS]);
        Permission::create(['name' => Permissions::USERACCESS]);
    }

    public function assignPermissionToRole()
    {
        Role::findByName(Roles::MANAGER)->givePermissionTo(Permissions::TOTALACCESS);
        Role::findByName(Roles::SUPPORTER)->givePermissionTo(Permissions::SUPPORTERACCESS);
        Role::findByName(Roles::USER)->givePermissionTo(Permissions::USERACCESS);
    }


    public function assingRoleToUser()
    {
        $user=$this->userRepository->find(1);
        $user->assignRole(Roles::MANAGER);
    }
    public function assignPermissionToUser()
    {
        $user=$this->userRepository->find(1);
        $user->givePermissionTo(Permissions::TOTALACCESS);
    }
}
