<?php

namespace App\Http\Controllers;

use App\nome_desejado;
use Illuminate\Http\Request;
use Gate;

class BaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('View_nome_desejado')) {
                $titulo = "nome_desejados ";
                $nome_desejados = Modell::paginate(20);
                return view('pastaView.index', compact('nome_desejados', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cadastrar()
    {
        if (Gate::allows('Insert_nome_desejado')) {
            $titulo = "Novo cadastro de nome_desejado ";
            return view('pastaView.formulario', compact('titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {
        if (Gate::allows('Insert_nome_desejado')) {
            nome_desejado::create($request->all());
            return redirect('rota');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(nome_desejado $nome_desejado)
    {
        if (Gate::allows('Edit_nome_desejado')) {
            $nome_desejado = nome_desejado::findOrFail($nome_desejado->id);
            $titulo = "Editar ";
            return view('pastaView.formulario', compact('nome_desejado', 'titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_nome_desejado')) {
            $nome_desejado = model::findOrFail($id);
            $formRequest = $request->all();
            $update =  $nome_desejado->update($formRequest);
            return redirect('rota');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        if (Gate::allows('Delete_nome_desejado')) {
            $nome_desejado = model::findOrFail($id);
            $nome_desejado->delete();
            return redirect('rota');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de nome_desejadoes com o nome de  ' . $request->get('table_search');
            if (Gate::allows('View_nome_desejado')) {
                $nome_desejados = new model();
                $search = $request->get('table_search');
                $nome_desejados = model::where('nome_do_campo_da_consulta', 'like', '%' . $search . '%')->paginate(10);

                return view('pastaView.index', compact('titulo', 'nome_desejados'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
