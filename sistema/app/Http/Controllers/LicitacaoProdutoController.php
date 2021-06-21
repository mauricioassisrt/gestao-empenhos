<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Fornecedor;
use App\Licitacao;
use App\LicitacaoProduto;
use App\LicitacaoProdutoProduto;
use App\Produto;
use Illuminate\Http\Request;
use Gate;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoriaExport;
use App\Exports\LicitacaoExport;
use App\Exports\ProdutoExport;
use App\Imports\CategoriaImport;
use App\Imports\ProdutoImport;

class LicitacaoProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('View_LicitacaoProduto')) {
                $titulo = "Licitações";
                $licitacaos = Licitacao::paginate(20);
                return view('licitacaoproduto.index', compact('licitacaos', 'titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cadastrar(Licitacao $licitacao)
    {

        if (Gate::allows('Insert_LicitacaoProduto')) {
            $titulo = "Cadastro de produtos em uma licitação  ";
            $fornecedors = Fornecedor::all();
            $categorias = Categoria::all();

            return view('licitacaoproduto.formulario', compact('titulo', 'licitacao', 'fornecedors', 'categorias'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {

        try {

            if (Gate::allows('Insert_LicitacaoProduto')) {


                // //verificar o produto inserido se já existe e inserir ou atualizar a quantidade

                $licitacaoProdutoProduto = new LicitacaoProduto();

                foreach ($request->produto_id as $key => $value) {

                    $produtoLicitacao = LicitacaoProduto::where('produto_id', $request->produto_id[$key])->first();

                    $valorIten = 0;

                    /**
                     *  IF VERIFICA SE A TABELA ESTA VAZIA sE NÃO HÁ LICITACAO COM PRODUTO VINCULADO
                     **/
                    if ($produtoLicitacao == null) {

                        $valorIten = $request->quantidadeItens[$key] * $request->valorUnitario[$key];
                        $licitacaoProdutoProduto->quantidade_produto = $request->quantidadeItens[$key];
                        $licitacaoProdutoProduto->valor_total_iten = $valorIten;
                        $licitacaoProdutoProduto->licitacao_id = $request->licitacao_id;
                        $licitacaoProdutoProduto->produto_id = $request->produto_id[$key];
                        $licitacaoProdutoProduto->fornecedor_id = $request->fornecedor_id;
                        $licitacaoProdutoProduto->save();
                        $licitacaoProdutoProduto = new LicitacaoProduto();

                        /*
                        *   caso o fornecedor escolhido seja diferente de algúm retornado
                        */
                    } else if ($produtoLicitacao->fornecedor_id != $request->fornecedor_id) {

                        $valorIten = ($request->quantidadeItens[$key] + $produtoLicitacao->quantidade_produto) * $request->valorUnitario[$key];

                        $licitacaoProdutoProduto->quantidade_produto = $request->quantidadeItens[$key];
                        $licitacaoProdutoProduto->valor_total_iten = $valorIten;

                        $licitacaoProdutoProduto->licitacao_id = $request->licitacao_id;
                        $licitacaoProdutoProduto->produto_id = $request->produto_id[$key];
                        $licitacaoProdutoProduto->fornecedor_id = $request->fornecedor_id;
                        $licitacaoProdutoProduto->save();
                        $licitacaoProdutoProduto = new LicitacaoProduto();
                        /*
                         * Caso a consulta produtoLicitacao não seja null e o fornecedor vindo da view seja igual o do banco, dai faz update
                        */
                    } else {
                        // dd('no else ');
                        /*
                            obtem o valor vindo do form e atualiza
                        */
                        $valorIten = ($request->quantidadeItens[$key] + $produtoLicitacao->quantidade_produto) * $request->valorUnitario[$key];

                        $licitacaoProdutoAtualizar['quantidade_produto'] = $request->quantidadeItens[$key] + $produtoLicitacao->quantidade_produto;
                        $licitacaoProdutoAtualizar['valor_total_iten'] = $valorIten;
                        $produtoLicitacao->update($licitacaoProdutoAtualizar);
                    }
                }

                // $quantidade = 0;
                // $valor_total = 0;

                // $licitacaoProdutos = LicitacaoProduto::where('licitacao_id', $request->licitacao_id)->get();
                // $licitacao = Licitacao::findOrFail($request->licitacao_id);
                // foreach ($licitacaoProdutos as $licitacaoProduto) {
                //     $quantidade += $licitacaoProduto->quantidade_produto;
                //     $valor_total += $licitacaoProduto->valor_total_iten;
                // }

                // $licitacaoAtualizar['valor_final'] = $valor_total;
                // $licitacaoAtualizar['total_produtos'] =  $quantidade;

                // $licitacao->update($licitacaoAtualizar);

                return redirect('licitacao/vincular/cadastrar/' . $request->licitacao_id)->with('status', 'Fornecedor e produtos vinculado a licitação!');
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    public function editar(Licitacao $licitacaoProduto)
    {

        try {
            if (Gate::allows('Edit_LicitacaoProduto')) {

                $titulo = "Total de produtos nesta licitação  ";
                $licitacaoProdutos = LicitacaoProduto::where('licitacao_id', $licitacaoProduto->id)->paginate(10);
                return view('licitacaoproduto.editar', compact('licitacaoProdutos', 'titulo', 'licitacaoProduto'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.sem_permissao');
        }
    }


    public function update(Request $request, $id)
    {
        try {
            if (Gate::allows('Edit_LicitacaoProduto')) {
                $LicitacaoProduto = LicitacaoProduto::findOrFail($id);
                $update =  $LicitacaoProduto->update($request->all());
                return redirect('licitacaoproduto');
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function atualizarLicitacaoProduto(Request $request)
    {

        try {

            $LicitacaoProduto = LicitacaoProduto::findOrFail($request->licitacao_item);
            $LicitacaoProduto['quantidade_produto'] = $request->quantidade_produto;
            $LicitacaoProduto['valor_total_iten'] = $request->quantidade_produto * $request->valor_total_iten;

            $LicitacaoProduto->save();
            return back()->with('message', 'Atualizado com sucesso ');
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
    public function deletar(Licitacao $licitacao)
    {
        try {

            if (Gate::allows('Delete_LicitacaoProduto')) {
                $licitacaoProdutos = LicitacaoProduto::where('licitacao_id', $licitacao->id)->get();

                $licitacaoEdit['valor_final'] = null;
                $licitacaoEdit['total_produtos'] = null;

                $licitacao->update($licitacaoEdit);

                foreach ($licitacaoProdutos as $licitacaoProduto) {
                    $licitacaoProduto->delete();
                }

                return redirect('licitacaoproduto');
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }
    /*
     METODO DE PESQUISAR
    */
    public function search(Request $request)
    {
        try {

            if (Gate::allows('pessoa_view')) {
                $licitacaos = new Licitacao();
                $search = $request->get('table_search');
                $licitacaos = Licitacao::where('numero_licitacao', 'like', '%' . $search . '%')->paginate(10);
                if ($licitacaos->isEmpty()) {
                    $titulo = 'Sua pesquisa não retornou nenhum resultado!';
                } else {
                    $titulo = 'Sua pesquisa retornou os seguintes resultados ';
                }
                return view('licitacaoproduto.index', compact('titulo', 'licitacaos'));
            } else {
                return view('errors.404', compact('titulo'));
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }

}
