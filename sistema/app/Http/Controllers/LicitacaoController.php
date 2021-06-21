<?php

namespace App\Http\Controllers;

use App\Licitacao;
use Illuminate\Http\Request;
use Gate;

class LicitacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('View_licitacao')) {
                $titulo = "Licitações";
                $licitacaos = Licitacao::paginate(20);
                return view('licitacao.index', compact('licitacaos', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cadastrar()
    {
        if (Gate::allows('Insert_licitacao')) {
            $titulo = "Novo cadastro de licitacao ";
            return view('licitacao.formulario', compact('titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {

        if (Gate::allows('Insert_licitacao')) {

            Licitacao::create($request->all());
            return redirect('licitacao/vincular');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(licitacao $licitacao)
    {
        if (Gate::allows('Edit_licitacao')) {
            $licitacao = Licitacao::findOrFail($licitacao->id);
            $titulo = "Editar ";
            return view('licitacao.formulario', compact('licitacao', 'titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_licitacao')) {
            $licitacao = Licitacao::findOrFail($id);
            $update =  $licitacao->update($request->all());
            return redirect('licitacao/vincular');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        try {
            if (Gate::allows('Delete_licitacao')) {
                $licitacao = Licitacao::findOrFail($id);
                $licitacao->delete();
                return redirect('licitacao/vincular');
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de licitacaoes com o número  ' . $request->get('table_search');
            if (Gate::allows('View_licitacao')) {
                $licitacao = new Licitacao();
                $search = $request->get('table_search');
                $licitacaos = licitacao::where('numero_licitacao', 'like', '%' . $search . '%')->paginate(10);

                return view('licitacao.index', compact('titulo', 'licitacaos'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
