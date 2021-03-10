<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Gate;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('View_categoria')) {
                $titulo = "Categorias ";
                $categorias = Categoria::paginate(20);
                return view('categoria.index', compact('categorias', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cadastrar()
    {
        if (Gate::allows('Insert_categoria')) {
            $titulo = "Novo cadastro de categoria ";
            return view('categoria.formulario', compact('titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {
        if (Gate::allows('Insert_categoria')) {
            Categoria::create($request->all());
            return redirect('categoria');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(categoria $categoria)
    {
        if (Gate::allows('Edit_categoria')) {
            $categoria = Categoria::findOrFail($categoria->id);
            $titulo = "Editar ";
            return view('categoria.formulario', compact('categoria', 'titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_categoria')) {
            $categoria = Categoria::findOrFail($id);
            $formRequest = $request->all();
            $update =  $categoria->update($formRequest);
            return redirect('categoria');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        if (Gate::allows('Delete_categoria')) {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
            return redirect('categoria');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de categoriaes com o nome de  ' . $request->get('table_search');
            if (Gate::allows('View_categoria')) {
                $categorias = new Categoria();
                $search = $request->get('table_search');
                $categorias = Categoria::where('nome_categoria', 'like', '%' . $search . '%')->paginate(10);

                return view('categoria.index', compact('titulo', 'categorias'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
