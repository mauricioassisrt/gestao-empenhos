<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Fornecedor;
use App\PessoaUnidade;
use App\Produto;
use App\Requisicao;
use App\Unidade;
use Illuminate\Http\Request;
use Gate;

class RequisicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('View_requisicao')) {
                $titulo = "Requisicao ";
                $requisicao = Requisicao::paginate(20);
                return view('requisicao.index', compact('requisicao', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cadastrar()
    {

        try {
            if (Gate::allows('Insert_requisicao')) {
                $titulo = "Novo cadastro de Requisicao ";
                $unidades = Unidade::all();
                $fornecedors = Fornecedor::all();
                $pessoa_unidades = PessoaUnidade::all();
                $categorias = Categoria::all();
                $produtos = Produto::all();

                return view('requisicao.formulario', compact('titulo', 'categorias', 'unidades', 'fornecedors', 'pessoa_unidades', 'produtos'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
        }
    }

    /**
     *
     * Get Categoria API que busca a categoria selecionada e retorna uma lista de produtos
     *
     */
    public function getCategoria(Request $request)
    {
        $produtos = Produto::where('categoria_id', $request->categoria_id)->get();

        //pegar o email e comparar, e pegar a senha vinda e comparar
        if ($produtos != "[]") {
            return response()->json(['success' => 'success', 'produtos' => $produtos]);
        } else {
            return response()->json(['error' => 'error', 'produtos' => 'Sem dados']);
        }
    }

    public function insert(Request $request)
    {
        if (Gate::allows('Insert_requisicao')) {
            dd($request);
            Requisicao::create($request->all());
            return redirect('requisicao');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(Requisicao $requisicao)
    {
        if (Gate::allows('Edit_requisicao')) {
            $requisicao = Requisicao::findOrFail($requisicao->id);
            $titulo = "Editar ";
            return view('requisicao.formulario', compact('Requisicao', 'titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_requisicao')) {
            $requisicao = Requisicao::findOrFail($id);
            $formRequest = $request->all();
            $update =  $requisicao->update($formRequest);
            return redirect('requisicao');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        if (Gate::allows('Delete_requisicao')) {
            $requisicao = Requisicao::findOrFail($id);
            $requisicao->delete();
            return redirect('requisicao');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de Requisicaoes com o nome de  ' . $request->get('table_search');
            if (Gate::allows('View_requisicao')) {
                $requisicao = new Requisicao();
                $search = $request->get('table_search');
                $requisicao = Requisicao::where('nome_do_campo_da_consulta', 'like', '%' . $search . '%')->paginate(10);

                return view('requisicao.index', compact('titulo', 'Requisicao'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
