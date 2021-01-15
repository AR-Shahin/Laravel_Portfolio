<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use function view;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';


    public function showLoginForm()
    {
        return view('backend.admin.login');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('admin/login');
    }

}
