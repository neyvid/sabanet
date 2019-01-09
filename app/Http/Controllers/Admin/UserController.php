<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository=new UserRepository();

    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
