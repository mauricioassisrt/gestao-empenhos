<?php

namespace App\Http\Controllers\Auth;

use App\Empresa as AppEmpresa;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function showLoginForm()
    {
        $empresa = AppEmpresa::all();
        if (empty($empresa)) {
            return view('errors.404');
        } else {
            return view('auth.login', compact('empresa'));

        }
    }
}
