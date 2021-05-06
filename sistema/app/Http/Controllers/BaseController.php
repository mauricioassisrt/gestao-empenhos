<?php

namespace App\Http\Controllers;

use App\model;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Database\Eloquent\Model;

class BaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('View_model')) {
                $titulo = "model ";
                $model = Model::paginate(20);
                return view('pastaView.index', compact('model', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cadastrar()
    {
        if (Gate::allows('Insert_model')) {
            $titulo = "Novo cadastro de model ";
            return view('pastaView.formulario', compact('titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {
        if (Gate::allows('Insert_model')) {
            model::create($request->all());
            return redirect('rota');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(model $model)
    {
        if (Gate::allows('Edit_model')) {
            $model = model::findOrFail($model->id);
            $titulo = "Editar ";
            return view('pastaView.formulario', compact('model', 'titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_model')) {
            $model = model::findOrFail($id);
            $formRequest = $request->all();
            $update =  $model->update($formRequest);
            return redirect('rota');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        if (Gate::allows('Delete_model')) {
            $model = model::findOrFail($id);
            $model->delete();
            return redirect('rota');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de modeles com o nome de  ' . $request->get('table_search');
            if (Gate::allows('View_model')) {
                $model = new model();
                $search = $request->get('table_search');
                $model = model::where('nome_do_campo_da_consulta', 'like', '%' . $search . '%')->paginate(10);

                return view('pastaView.index', compact('titulo', 'model'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
