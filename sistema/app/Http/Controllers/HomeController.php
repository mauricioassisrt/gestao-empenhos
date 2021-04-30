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
use App\Pessoa;
use App\PessoaUnidade;
use App\Requisicao;

class HomeController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth');
    }

    public function dashboard()
    {

        try {

            if (Gate::allows('View_requisicao') && Gate::allows('minhas_requisicoes')) {

                $user = Auth::user();
                $pessoa = Pessoa::where('user_id', $user->id)->first();
                $pessoaUnidade = PessoaUnidade::where('pessoa_id', $pessoa->id)->first();
                $titulo = "Minhas Requisições ";
                $requisicaos = Requisicao::paginate(20);
                return view('requisicao.minhaRequisicao', compact('requisicaos', 'titulo', 'pessoaUnidade'));

            } else if (Gate::allows('finalizar_requisicao')) {

                $titulo = "Painel Principal: Visão responsável pelos empenhos ";
                $requisicaos =  Requisicao::where('status', 'Empenho')->paginate(10);
                $requisicaos_finalizadas =  Requisicao::where('status', 'Finalizado')->count();

                return view('dashboard', compact('titulo', 'requisicaos', 'requisicaos_finalizadas'));

            } else if (Gate::allows('View_requisicao') && !Gate::allows('secretario_municipal_aprova_requisicao')) {

                $titulo = "Painel Principal: Visão responsável da contabilidade ";
                $requisicaos_empenhadas =  Requisicao::where('status', 'Empenho')->count();
                $requisicaos_add_reduzido =  Requisicao::where('status', 'Contabilidade')->count();
                $requisicaos =  Requisicao::where('status', 'Deferido')->paginate(10);

                return view('dashboard', compact('requisicaos', 'titulo', 'requisicaos_empenhadas'));

            } else if (Gate::allows('secretario_municipal_aprova_requisicao')) {
                $titulo = "Painel Principal: Visão secretário(a)  ";
                $user = Auth::user();
                $pessoa = Pessoa::where('user_id', $user->id)->first();
                //$unidades = Unidade::where('secretaria_id', $pessoa->secretaria_id)->get();

                $requisicaos =  Requisicao::where('status', 'Enviado')->paginate(10);
                return view('requisicao.secretaria_aprovar_requisicao', compact('titulo', 'requisicaos', 'pessoa'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.404', compact($th));
        }
    }
}
