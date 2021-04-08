<?php

namespace App\Http\Controllers;

use App\LicitacaoProduto;
use App\LicitacaoProdutoProduto;
use Illuminate\Http\Request;
use Gate;
class LicitacaoProdutoProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('View_LicitacaoProduto')) {
                $titulo = "Licitações";
                $licitacaoProdutos = LicitacaoProduto::paginate(20);
                return view('LicitacaoProduto.index', compact('LicitacaoProdutos', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cadastrar()
    {
        if (Gate::allows('Insert_LicitacaoProduto')) {
            $titulo = "Novo cadastro de LicitacaoProduto ";
            return view('LicitacaoProduto.formulario', compact('titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {

        if (Gate::allows('Insert_LicitacaoProduto')) {

            LicitacaoProduto::create($request->all());
            return redirect('LicitacaoProduto');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(LicitacaoProduto $LicitacaoProduto)
    {
        if (Gate::allows('Edit_LicitacaoProduto')) {
            $LicitacaoProduto = LicitacaoProduto::findOrFail($LicitacaoProduto->id);
            $titulo = "Editar ";
            return view('LicitacaoProduto.formulario', compact('LicitacaoProduto', 'titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_LicitacaoProduto')) {
            $LicitacaoProduto = LicitacaoProduto::findOrFail($id);
            $update =  $LicitacaoProduto->update($request->all());
            return redirect('LicitacaoProduto');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        if (Gate::allows('Delete_LicitacaoProduto')) {
            $LicitacaoProduto = LicitacaoProduto::findOrFail($id);
            $LicitacaoProduto->delete();
            return redirect('LicitacaoProduto');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de LicitacaoProdutoes com o número  ' . $request->get('table_search');
            if (Gate::allows('View_LicitacaoProduto')) {
                $LicitacaoProduto = new LicitacaoProduto();
                $search = $request->get('table_search');
                $licitacaoProdutos = LicitacaoProduto::where('numero_LicitacaoProduto', 'like', '%' . $search . '%')->paginate(10);

                return view('LicitacaoProduto.index', compact('titulo', 'LicitacaoProdutos'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
