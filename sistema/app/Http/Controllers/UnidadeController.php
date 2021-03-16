<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Fornecedor;
use App\Secretaria;
use App\Unidade;
use Illuminate\Http\Request;
use Gate;

class UnidadeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {

            if (Gate::allows('View_unidade')) {

                $titulo = "Unidades";
                $unidades = Unidade::paginate(20);
                return view('unidade.index', compact('unidades', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }
    public function cadastrar()
    {
        if (Gate::allows('Insert_unidade')) {
            $titulo = "Novo cadastro de Unidade ";
            $secretarias = Secretaria::all();
            return view('unidade.formulario', compact('titulo',  'secretarias'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {
        if (Gate::allows('Insert_unidade')) {

            Unidade::create($request->all());
            return redirect('unidade');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(Unidade $unidade)
    {
        if (Gate::allows('Edit_unidade')) {
            $unidade = Unidade::findOrFail($unidade->id);
            $secretarias = Secretaria::all();
            $titulo = "Editar ";
            return view('unidade.formulario', compact('titulo', 'unidade', 'secretarias'));
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_unidade')) {
            $unidade = Unidade::findOrFail($id);
            $formRequest = $request->all();
            $update =  $unidade->update($formRequest);
            return redirect('unidade');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function deletar($id)
    {
        if (Gate::allows('Delete_unidade')) {
            $unidade = Unidade::findOrFail($id);
            $unidade->delete();
            return redirect('unidade');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de Unidadees com o nome de  ' . $request->get('table_search');
            if (Gate::allows('View_unidade')) {
                $unidades = new Unidade();
                $search = $request->get('table_search');
                $unidades = Unidade::where('nome', 'like', '%' . $search . '%')->paginate(10);

                return view('unidade.index', compact('titulo', 'unidades'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
