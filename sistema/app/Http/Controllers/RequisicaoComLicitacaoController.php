<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Fornecedor;
use App\Licitacao;
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
    public function cadastrar()
    {

        try {
            if (Gate::allows('Insert_requisicao')) {
                $produtos = Produto::all();
                // $collection = collect(LicitacaoProduto::all());

                // $licitacaos = $collection->unique('licitacao_id');

                // $licitacaos->values()->all();
                $licitacaos = Licitacao::all();
                $titulo = "Novo cadastro de Requisicao ";
                $unidades = Unidade::all();
                $fornecedors = Fornecedor::all();
                $pessoa_unidades = PessoaUnidade::all();


                return view('requisicaoLicitacao.formulario', compact('titulo', 'licitacaos', 'unidades', 'fornecedors', 'pessoa_unidades',));
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
    public function getLicitacao(Request $request)
    {
        //consulta inner join categoria licitacao_produtos
        $produto = LicitacaoProduto::where('licitacao_id', $request->licitacao_id)
        ->join('produtos' , 'produtos.id' , '=','produto_id')
        ->join('categorias' , 'produtos.categoria_id' , '=','categorias.id')->get();
        $collection = collect($produto);

        $produto = $collection->unique('produto_id');

        $produto->values()->all();
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
               // $produto = Produto::findOrfail($value);
                $valor_final += $request->quantidadeItens[$key] * $request->valor_unitario[$key];
                $total_produtos += $request->quantidadeItens[$key];
            }

            $request['valor_final'] = $valor_final;
            $request['total_produtos'] =   $total_produtos;
            $request['status'] = "Enviado";

            $id = Requisicao::create($request->all())->id;
            $requisicaoAno = $id . '-' . $year = date('Y');
            $requisicao = Requisicao::findOrFail($id);

            $reqArray = array(
                'requisicao_ano' => $requisicaoAno,

            );
            $requisicao->update($reqArray);
            $requisicaoProduto = new RequisicaoProduto();
            foreach ($request->produto_id as $key => $value) {
               // $produto = Produto::findOrfail($value);
                $valorIten = $request->quantidadeItens[$key] * $request->valor_unitario[$key];
                $requisicaoProduto->quantidade_produto = $request->quantidadeItens[$key];
                $requisicaoProduto->valor_total_iten = $valorIten;
                $requisicaoProduto->requisicao_id = $id;
                $requisicaoProduto->produto_id = $request->produto_id[$key];
                $requisicaoProduto->licitacao_produto_id = $request->licitacao_id[$key];
                $requisicaoProduto->save();
                $requisicaoProduto = new RequisicaoProduto();
            }


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

                return view('requisicaoLicitacao.index', compact('titulo', 'Requisicao'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
