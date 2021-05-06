<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Fornecedor;
use App\Produto;
use Illuminate\Http\Request;
use Gate;

class ProdutoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {

            if (Gate::allows('View_produto')) {

                $titulo = "Produtos";
                $produtos = Produto::paginate(20);
                return view('produto.index', compact('produtos', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }
    public function cadastrar()
    {
        if (Gate::allows('Insert_produto')) {
            $titulo = "Novo cadastro de produto ";
            $fornecedors = Fornecedor::all();
            $categorias = Categoria::all();
            return view('produto.formulario', compact('titulo', 'fornecedors', 'categorias'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {
        if (Gate::allows('Insert_produto')) {

            Produto::create($request->all());
            return redirect('produto');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(Produto $produto)
    {
        if (Gate::allows('Edit_produto')) {
            $produto = Produto::findOrFail($produto->id);
            $fornecedors = Fornecedor::all();
            $categorias = Categoria::all();
            $titulo = "Editar ";
            return view('produto.formulario', compact('titulo', 'produto',  'fornecedors', 'categorias'));
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_produto')) {
            $produto = Produto::findOrFail($id);
            $formRequest = $request->all();
            $update =  $produto->update($formRequest);
            return redirect('produto');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        if (Gate::allows('Delete_produto')) {
            $produto = Produto::findOrFail($id);
            $produto->delete();
            return redirect('produto');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de produtoes com o nome de  ' . $request->get('table_search');
            if (Gate::allows('View_produto')) {
                $produtos = new Produto();
                $search = $request->get('table_search');
                $produtos = Produto::where('nome', 'like', '%' . $search . '%')->paginate(10);

                return view('produto.index', compact('titulo', 'produtos'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
