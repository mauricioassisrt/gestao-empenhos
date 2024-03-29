<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Fornecedor;
use App\Http\Requests\RequisicaoRequest;
use App\Pessoa;
use App\PessoaUnidade;
use App\Produto;
use App\Requisicao;
use App\RequisicaoProduto;
use App\Secretaria;
use App\Unidade;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;

class RequisicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            if (Gate::allows('View_requisicao') && Gate::allows('minhas_requisicoes')) {

                $user = Auth::user();
                $pessoa = Pessoa::where('user_id', $user->id)->first();
                $pessoaUnidades = PessoaUnidade::where('pessoa_id', $pessoa->id)->get();

                $titulo = "Minhas Requisições ";
                $requisicaos = Requisicao::paginate(20);
                return view('requisicao.minhaRequisicao', compact('requisicaos', 'titulo', 'pessoaUnidades'));
            } else if (Gate::allows('finalizar_requisicao')) {

                $titulo = "Todas as requisições aguardando finalização   ";
                $requisicaos = Requisicao::paginate(20);
                return view('requisicao.index', compact('titulo', 'requisicaos'));
            } else if (Gate::allows('View_requisicao') && !Gate::allows('secretario_municipal_aprova_requisicao')) {
                $titulo = "Todas as requisições  ";
                $requisicaos = Requisicao::paginate(20);
                return view('requisicao.index', compact('requisicaos', 'titulo'));
            } else if (Gate::allows('secretario_municipal_aprova_requisicao')) {
                $titulo = "Todas as requisições aguardando aprovação  ";
                $user = Auth::user();
                $pessoa = Pessoa::where('user_id', $user->id)->first();
                //$unidades = Unidade::where('secretaria_id', $pessoa->secretaria_id)->get();
                $requisicaos = Requisicao::paginate(10);
                return view('requisicao.secretaria_aprovar_requisicao', compact('titulo', 'requisicaos', 'pessoa'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.sem_permissao');
        }
    }
    public function cadastrar()
    {

        try {
            if (Gate::allows('Insert_requisicao')) {
                $titulo = " Requisição sem licitação vinculada!";
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

    public function insert(RequisicaoRequest $request)
    {

        try {
            // &&  $request->hasFile('orcamento_um')
            if (Gate::allows('Insert_requisicao')) {

                $valor_final = 0;
                $total_produtos = 0;
                $orcamento_dois = null;
                $orcamento_um = null;
                $orcamento_tres = null;

                foreach ($request->produto_id as $key => $value) {
                    //$produto = Produto::findOrfail($value);
                    $valor_final += $request->quantidadeItens[$key] * $request->valorUnitario[$key];
                    $total_produtos += $request->quantidadeItens[$key];
                }

                $request['valor_final'] = $valor_final;
                $request['total_produtos'] =   $total_produtos;
                $request['status'] = "Enviado";

                $id = Requisicao::create($request->all())->id;
                $requisicaoAno = $id . '-' . $year = date('Y');
                $requisicao = Requisicao::findOrFail($id);

                if ($request->hasFile('orcamento_um')) {
                    /* UPLOAD de imagem ORCAMENTO 1  */
                    $image = $request->file('orcamento_um');
                    $dir = "img/requisicoes/orcamentos/" . $requisicaoAno;
                    $extencao = $image->guessClientExtension();
                    $nomeImagem = "requisicao-orcamento-1" . "." . $extencao;
                    $image->move($dir, $nomeImagem);
                    $orcamento_um = $dir . "/" . $nomeImagem;

                    /* fim do upload  */
                }

                if ($request->hasFile('orcamento_dois')) {

                    /* UPLOAD de imagem ORCAMENTO 2  */
                    $image = $request->file('orcamento_dois');
                    $dir = "img/requisicoes/orcamentos/" . $requisicaoAno;
                    $extencao = $image->guessClientExtension();
                    $nomeImagem = "requisicao-orcamento-2" . "." . $extencao;
                    $image->move($dir, $nomeImagem);
                    $orcamento_dois = $dir . "/" . $nomeImagem;
                    /* fim do upload  */
                }
                if ($request->hasFile('orcamento_tres')) {
                    /* UPLOAD de imagem ORCAMENTO 2  */

                    $image = $request->file('orcamento_tres');
                    $dir = "img/requisicoes/orcamentos/" . $requisicaoAno;
                    $extencao = $image->guessClientExtension();
                    $nomeImagem = "requisicao-orcamento-3" . "." . $extencao;
                    $image->move($dir, $nomeImagem);
                    $orcamento_tres = $dir . "/" . $nomeImagem;
                    /* fim do upload  */
                }

                $reqArray = array(
                    'requisicao_ano' => $requisicaoAno,
                    'orcamento_um' => $orcamento_um,
                    'orcamento_dois' => $orcamento_dois,
                    'orcamento_tres' => $orcamento_tres
                );

                $requisicao->update($reqArray);
                $requisicaoProduto = new RequisicaoProduto();
                foreach ($request->produto_id as $key => $value) {
                    //  $produto = Produto::findOrfail($value);
                    $valorIten = $request->quantidadeItens[$key] * $request->valorUnitario[$key];

                    $requisicaoProduto->quantidade_produto = $request->quantidadeItens[$key];
                    $requisicaoProduto->valor_total_iten = $valorIten;
                    $requisicaoProduto->requisicao_id = $id;
                    $requisicaoProduto->produto_id = $request->produto_id[$key];

                    $requisicaoProduto->save();
                    $requisicaoProduto = new RequisicaoProduto();
                }


                return redirect('requisicao')->with('status', 'Requisição adicionada com sucesso!');
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.503', compact('th'));
        }
    }


    public function editar(Requisicao $requisicao)
    {

        try {
            $valor_total = 0;
            $quantidade_total = 0;

            $titulo = "Detalhes da requisição ";
            $unidades = Unidade::where('secretaria_id', $requisicao->unidades->secretaria->id)->get();
            $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)
                ->join('licitacaos', 'licitacaos.id', '=', 'licitacao_produto_id')->get();

            /*
                Caso a requisição não possua licitação vinculada entra no if
            */
            if ($requisicaoProdutos->isEmpty()) {
                $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)->get();
            }

            //CALCULOS MATEMATICOS PARA EXIBIR NO FRONT
            foreach ($requisicaoProdutos  as $item) {
                $valor_total += $item->valor_total_iten;
                $quantidade_total += $item->quantidade_produto;
            }

            $users = Auth::user();
            //verifica se a consulta eloquent é null
            if ($requisicao->unidades->pessoaUnidades->first() != null) {
                //verifica se a requisicao e o usuario logado tem relação
                if (Gate::allows('minhas_requisicoes') && $users->pessoas->first()->id ==  $requisicao->unidades->pessoaUnidades->first()->pessoa_id) {

                    return view('requisicao.editar', compact('requisicaoProdutos', 'requisicao', 'titulo', 'unidades', 'valor_total', 'quantidade_total'));
                    // se tem permissão de edit é pq é um adm do sistema ou contabilidade
                } else if (Gate::allows('Edit_requisicao')) {
                    return view('requisicao.editar', compact('requisicaoProdutos', 'requisicao', 'titulo', 'unidades', 'valor_total', 'quantidade_total'));
                } else {
                    return view('errors.sem_permissao');
                }
                //caso a consulta seja null no if porém o user logado é admin ou contabilidade
            } else if (Gate::allows('Edit_requisicao')) {

                return view('requisicao.editar', compact('requisicaoProdutos', 'requisicao', 'titulo', 'unidades', 'valor_total', 'quantidade_total'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }


    public function update(Request $request, Requisicao $requisicao)
    {
        try {

            if (Gate::allows('Edit_requisicao')) {

                $requisicao->update($request->all());
                return redirect('requisicao');
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            return view('errors.503', compact('th'));
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
            if (Gate::allows('View_requisicao') &&  Gate::allows('search_requisicao')) {
                $requisicao = new Requisicao();
                $search = $request->get('table_search');

                $requisicaos = Requisicao::where('justificativa', 'like', '%' . $search . '%')->paginate(10);

                return view('requisicao.index', compact('titulo', 'requisicaos'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
