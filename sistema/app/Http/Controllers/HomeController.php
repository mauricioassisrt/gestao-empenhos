<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Permission;
use App\Role;
use Carbon\Carbon;
use App\Empresa;
use App\Locador;
use App\Equipamento;
use App\Iten;
use Gate;
use Illuminate\Support\Facades\Auth;
use App\notice;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function erro()
    {
        return view('erro');
    }

    public function sem()
    {
        return view('sem');
    }

    public function dashboard()
    {

        try {
            if (Gate::allows('dashboard_empresa')) {

                $dados = array(
                    'titulo' => "Dashboard EMPRESA",
                    'empresa'=> Empresa::all()
                );

                return view('dashboard_empresa', $dados);
            } else {

                $dados = array(
                    'titulo' => 'Dashboard ADM',
                    'total_user' => User::count(),
                    // 'total_posts' => Post::count(),
                    'total_permissions' => Permission::count(),
                    'total_roles' => Role::count(),
                    'empresa'=> Empresa::all()
                );

                return view('dashboard', $dados);
            }
        } catch (\Throwable $th) {
           return view('error');
        }


    }
}
