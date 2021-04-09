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
    public function cadastrar()
    {
        if (Gate::allows('Insert_LicitacaoProduto')) {
            $titulo = "Cadastro de produtos em uma licitação  ";
            $fornecedors = Fornecedor::all();
            $licitacaos = Licitacao::all();
            $categorias = Categoria::all();
            return view('licitacaoproduto.formulario', compact('titulo', 'licitacaos', 'fornecedors', 'categorias'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function insert(Request $request)
    {

        try {
            if (Gate::allows('Insert_LicitacaoProduto')) {

                $valor_final = 0;
                $total_produtos = 0;

                foreach ($request->produto_id as $key => $value) {
                    $produto = Produto::findOrfail($value);
                    $valor_final += $request->quantidadeItens[$key] * $produto->valor_unitario;
                    $total_produtos += $request->quantidadeItens[$key];
                }
                $licitacaoProduto = Licitacao::findOrFail($request->licitacao_id);
                $request['valor_final'] = $valor_final;
                $request['total_produtos'] =   $total_produtos;


                $licitacaoProduto->update($request->all());
                $licitacaoProdutoProduto = new LicitacaoProduto();
                foreach ($request->produto_id as $key => $value) {
                    $produto = Produto::findOrfail($value);
                    $valorIten = $request->quantidadeItens[$key] * $produto->valor_unitario;

                    $licitacaoProdutoProduto->quantidade_produto = $request->quantidadeItens[$key];
                    $licitacaoProdutoProduto->valor_total_iten = $valorIten;
                    $licitacaoProdutoProduto->licitacao_id = $request->licitacao_id;
                    $licitacaoProdutoProduto->produto_id = $produto->id;
                    $licitacaoProdutoProduto->fornecedor_id = $request->fornecedor_id;
                    $licitacaoProdutoProduto->save();
                    $licitacaoProdutoProduto = new LicitacaoProduto();
                }

                return redirect('licitacao/vincular');

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
            $licitacaoProdutos = LicitacaoProduto::where('licitacao_id', $licitacaoProduto->id)->get();
            return view('licitacaoproduto.editar', compact('licitacaoProdutos','titulo', 'licitacaoProduto'));
        } else {
            return view('errors.sem_permissao');
        }
      } catch (\Throwable $th) {
         return view('errors.sem_permissao');
      }
    }


    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_LicitacaoProduto')) {
            $LicitacaoProduto = LicitacaoProduto::findOrFail($id);
            $update =  $LicitacaoProduto->update($request->all());
            return redirect('licitacaoproduto');
        } else {
            return view('errors.sem_permissao');
        }
    }


    public function deletar($id)
    {
        if (Gate::allows('Delete_LicitacaoProduto')) {
            $LicitacaoProduto = LicitacaoProduto::findOrFail($id);
            $LicitacaoProduto->delete();
            return redirect('licitacaoproduto');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de LicitacaoProdutoes com o número  ' . $request->get('table_search');
            if (Gate::allows('View_LicitacaoProduto')) {
                $licitacaoProduto = new LicitacaoProduto();
                $search = $request->get('table_search');
                $licitacaoProdutos = LicitacaoProduto::where('numero_LicitacaoProduto', 'like', '%' . $search . '%')->paginate(10);

                return view('licitacaoproduto.index', compact('titulo', 'licitacaoProdutos'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
