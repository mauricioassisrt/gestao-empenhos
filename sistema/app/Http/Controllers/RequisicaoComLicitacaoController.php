<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Fornecedor;
use App\LicitacaoProduto;
use App\PessoaUnidade;
use App\Produto;
use App\Requisicao;
use App\RequisicaoProduto;
use App\Unidade;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\DB;

class RequisicaoComLicitacaoController extends Controller
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
                $requisicaos = Requisicao::paginate(20);
                return view('requisicaoLicitacao.index', compact('requisicaos', 'titulo'));
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
                $produtos = Produto::all();
                $collection = collect(LicitacaoProduto::all());

                $categorias = $collection->unique('licitacao_id');

                $categorias->values()->all();

                $titulo = "Novo cadastro de Requisicao ";
                $unidades = Unidade::all();
                $fornecedors = Fornecedor::all();
                $pessoa_unidades = PessoaUnidade::all();


                return view('requisicaoLicitacao.formulario', compact('titulo', 'categorias', 'unidades', 'fornecedors', 'pessoa_unidades',));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     *
     * Get Categoria API que busca a categoria selecionada e retorna uma lista de produtos
     *
     */
    public function getCategoria(Request $request)
    {
        //consulta inner join categoria licitacao_produtos
        $produto = LicitacaoProduto::where('licitacao_id', $request->categoria_id)
        ->join('produtos' , 'produtos.id' , '=','produto_id')->get();




        //pegar o email e comparar, e pegar a senha vinda e comparar
        if ($produto != "[]") {
            return response()->json(['success' => 'success', 'produtos' => $produto]);
        } else {
            return response()->json(['error' => 'error', 'produtos' => $request->categoria_id]);
        }
    }

    public function insert(Request $request)
    {
        if (Gate::allows('Insert_requisicao')) {

            $valor_final = 0;
            $total_produtos = 0;

            foreach ($request->produto_id as $key => $value) {
                $produto = Produto::findOrfail($value);
                $valor_final += $request->quantidadeItens[$key] * $produto->valor_unitario;
                $total_produtos += $request->quantidadeItens[$key];
            }

            $request['valor_final'] = $valor_final;
            $request['total_produtos'] =   $total_produtos;

            $id = Requisicao::create($request->all())->id;
            $requisicaoAno = $id . '/' . $year = date('Y');
            $requisicao = Requisicao::findOrFail($id);

            $reqArray = array(
                'requisicao_ano' => $requisicaoAno,

            );
            $requisicao->update($reqArray);
            $requisicaoProduto = new RequisicaoProduto();
            foreach ($request->produto_id as $key => $value) {
                $produto = Produto::findOrfail($value);
                $valorIten = $request->quantidadeItens[$key] * $produto->valor_unitario;

                $requisicaoProduto->quantidade_produto = $request->quantidadeItens[$key];
                $requisicaoProduto->valor_total_iten = $valorIten;
                $requisicaoProduto->requisicao_id = $id;
                $requisicaoProduto->produto_id = $produto->id;

                $requisicaoProduto->save();
                $requisicaoProduto = new RequisicaoProduto();
            }


            return redirect('requisicaoComLicitacao');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function editar(Requisicao $requisicao)
    {
        try {
            $titulo = "Detalhes da requisição ";
            if (Gate::allows('Edit_requisicao')) {
                $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)->get();
                return view('requisicaoLicitacao.editar', compact('requisicaoProdutos', 'requisicao', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_requisicao')) {
            $requisicao = Requisicao::findOrFail($id);
            $formRequest = $request->all();
            $update =  $requisicao->update($formRequest);
            return redirect('requisicaoComLicitacao');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        if (Gate::allows('Delete_requisicao')) {
            $requisicao = Requisicao::findOrFail($id);
            $requisicao->delete();
            return redirect('requisicaoComLicitacao');
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

                return view('requisicaoLicitacao.index', compact('titulo', 'Requisicao'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
