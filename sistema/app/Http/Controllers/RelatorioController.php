<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Requisicao;
use App\RequisicaoProduto;
use App\Unidade;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;
use PDF;

class RelatorioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
    INICIO
     ROUTE   relatorio/requsicao/periodo
    */
    public function periodo(Request $request)
    {
        try {
            if (Gate::allows('pessoa_view')) {
                $titulo = "Por período";
                return view('relatorios.formularios.periodo', compact('titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {

            return view('errors.404');
        }
    }
    /*
     ROUTE relatorio/requisicao/unidade/exibir
    */
    public function unidadeResultados(Request $request)
    {
        try {

            $requisicao =  Requisicao::whereBetween('created_at', [$request->inicio, $request->fim])->get();

            $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)->get();

            if ($requisicao->isEmpty()) {
                return redirect('relatorio/requsicao/periodo')->with('status', 'A busca não retornou nenhum resultado correspondente a pesquisa ');
            } else {
                dd($requisicao);
            }
        } catch (\Throwable $th) {
            return view('errors.404', );
        }
    }
    /*

        FIM
    */
    public function periodoBusca(Request $request)
    {
        try {
            if (Gate::allows('pessoa_view')) {
                $titulo = "Por período";
                return view('relatorios.formularios.periodo', compact('titulo'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {

            return view('errors.404');
        }
    }
    public function unidade(Request $request)
    {
        try {
            if (Gate::allows('pessoa_view')) {
                $titulo = "Por Requisição";
                $unidades = Unidade::all();
                return view('relatorios.formularios.requisicao-unidade', compact('titulo', 'unidades'));
            } else {
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {

            return view('errors.404');
        }
    }
    public function requisicaoResumo(Requisicao $requisicao)
    {
        $titulo = "Relatório de requisição realizada por unidade ";
        $empresa = Empresa::all();

        if ($requisicao->unidades->unidadesPessoa->pessoa->users->id == Auth::user()->id && Gate::allows('minhas_requisicoes')) {

            $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)
                ->join('licitacaos', 'licitacaos.id', '=', 'licitacao_produto_id')->get();
            if ($requisicaoProdutos->isEmpty()) {
                $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)->get();
            }
            dd('no if');
            return \PDF::loadView('relatorios.requisicao-resumo')->download('nome-arquivo-pdf-gerado.pdf', compact('requisicaoProdutos', 'requisicao', 'titulo'));
        } else if (Gate::allows('Edit_requisicao')) {

            $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)
                ->join('licitacaos', 'licitacaos.id', '=', 'licitacao_produto_id')->get();

            if ($requisicaoProdutos->isEmpty()) {

                $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)->get();
            }

            // $pdf = PDF::loadView('relatorios.requisicao-resumo', compact('requisicaoProdutos', 'requisicao', 'titulo', 'empresa'));
            // return $pdf->setPaper('a4')->stream('nome-pdf');

            // return \PDF::loadView('relatorios.requisicao-resumo')->download('nome-arquivo-pdf-gerado.pdf', );
            return view('relatorios.requisicao-resumo', compact('requisicaoProdutos', 'requisicao', 'titulo', 'empresa'));
        }
    }
}
