<?php

namespace App\Http\Controllers;

use App\Secretaria;
use Illuminate\Http\Request;
use Gate;
class SecretariaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('View_secretaria')) {
                $titulo = "Secretarias ";
                $secretarias = Secretaria::paginate(20);
                return view('secretaria.index', compact('secretarias', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cadastrar()
    {
        if (Gate::allows('Insert_secretaria')) {
            $titulo = "Novo cadastro de secretaria ";
            return view('secretaria.formulario', compact('titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {
        if (Gate::allows('Insert_secretaria')) {
            Secretaria::create($request->all());
            return redirect('secretaria');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(Secretaria $secretaria)
    {
        if (Gate::allows('Edit_secretaria')) {
            $secretaria = Secretaria::findOrFail($secretaria->id);
            $titulo = "Editar ";
            return view('secretaria.formulario', compact('secretarias', 'titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_secretaria')) {
            $secretaria = Secretaria::findOrFail($id);
            $formRequest = $request->all();
            $update =  $secretaria->update($formRequest);
            return redirect('secretaria');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        if (Gate::allows('Delete_secretaria')) {
            $secretaria = Secretaria::findOrFail($id);
            $secretaria->delete();
            return redirect('secretaria');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de Secretarias com o nome de  ' . $request->get('table_search');
            if (Gate::allows('View_secretaria')) {
                $secretaria = new Secretaria();
                $search = $request->get('table_search');
                $secretaria = Secretaria::where('nome_do_campo_da_consulta', 'like', '%' . $search . '%')->paginate(10);

                return view('secretaria.index', compact('titulo', 'secretaria'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
