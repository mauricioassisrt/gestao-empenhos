<?php

namespace App\Http\Controllers;

use App\Setor;
use Illuminate\Http\Request;
use Gate;
class SetorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('View_setor')) {
                $titulo = "setores";
                $setors = Setor::paginate(20);
                return view('setor.index', compact('setors', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }
    public function cadastrar()
    {
        if (Gate::allows('Insert_setor')) {
            $titulo = "Novo cadastro de setor ";
            return view('setor.formulario', compact('titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {
        if (Gate::allows('Insert_setor')) {
            Setor::create($request->all());
            return redirect('setor');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(setor $setor)
    {
        if (Gate::allows('Edit_setor')) {
            $setor = Setor::findOrFail($setor->id);
            $titulo = "Editar ";
            return view('setor.formulario', compact('setor', 'titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_setor')) {
            $setor = Setor::findOrFail($id);
            $formRequest = $request->all();
            $update =  $setor->update($formRequest);
            return redirect('setor');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        if (Gate::allows('Delete_setor')) {
            $setor = Setor::findOrFail($id);
            $setor->delete();
            return redirect('setor');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de setores com o nome de  ' . $request->get('table_search');
            if (Gate::allows('View_setor')) {
                $setor = new Setor();
                $search = $request->get('table_search');
                $setor = Setor::where('nome_setor', 'like', '%' . $search . '%')->paginate(10);

                return view('setor.index', compact('titulo', 'setors'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
