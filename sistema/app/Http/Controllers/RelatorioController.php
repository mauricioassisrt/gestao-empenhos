<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Pessoa;
use App\PessoaUnidade;
use App\Requisicao;
use App\RequisicaoProduto;
use App\Unidade;
use DateTime;
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

    public function porDataResultados(Request $request)
    {
        try {
            $titulo = "Requisições por periodo";
            $requisicaos =  Requisicao::whereBetween('created_at', [$request->inicio, $request->fim])->get();
            $requisicaoProdutos =  RequisicaoProduto::whereBetween('created_at', [$request->inicio, $request->fim])->get();
            $empresa = Empresa::all();

            /*
                Verifica o intervalo  de datas
            */
            $fdate = $request->inicio;
            $tdate = $request->fim;
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            // Verifica se a consulta é null
            if ($requisicaos->isEmpty()) {
                return redirect('relatorio/requsicao/periodo')->with('status', 'A busca não retornou nenhum resultado correspondente a pesquisa ');
                //se o intervalo é maior que 31 dias
            } else if ($days >= 31) {
                return redirect('relatorio/requsicao/periodo')->with('status', 'A data informada é superior a 31 dias!! ');
                //exibe o resultado
            } else {
                return view('relatorios.requisicao-por-data', compact('requisicaoProdutos', 'requisicaos', 'titulo', 'empresa'));
                // dd($requisicao);
            }
        } catch (\Throwable $th) {
            return view('errors.404');
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

    public function requisicaoResumo(Requisicao $requisicao)
    {
        $titulo = "Relatório de requisição realizada por unidade ";
        $empresa = Empresa::all();
        $user = Auth::user();
        $pessoa = Pessoa::where('user_id', $user->id)->first();
        $pessoaUnidades = PessoaUnidade::where('pessoa_id', $pessoa->id)->get();
        $contador = 0;
        foreach ($pessoaUnidades as $unidadesF) {
            if ($unidadesF->unidade_id == $requisicao->unidade_id) {
                $contador += 1;
            }
        }
        if ($contador != 0) {
            $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)
                ->join('licitacaos', 'licitacaos.id', '=', 'licitacao_produto_id')->get();
            if ($requisicaoProdutos->isEmpty()) {
                $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)->get();
            }

            return view('relatorios.requisicao-resumo', compact('requisicaoProdutos', 'requisicao', 'titulo', 'empresa', 'pessoaUnidades'));
        }

        if ($pessoaUnidades->isEmpty() && Gate::allows('Visualizar_relatorios_geral')) {

            $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)
                ->join('licitacaos', 'licitacaos.id', '=', 'licitacao_produto_id')->get();

            if ($requisicaoProdutos->isEmpty()) {

                $requisicaoProdutos = RequisicaoProduto::where('requisicao_id', $requisicao->id)->get();
            }

            // $pdf = PDF::loadView('relatorios.requisicao-resumo', compact('requisicaoProdutos', 'requisicao', 'titulo', 'empresa'));
            // return $pdf->setPaper('a4')->stream('nome-pdf');

            // return \PDF::loadView('relatorios.requisicao-resumo')->download('nome-arquivo-pdf-gerado.pdf', );
            return view('relatorios.requisicao-resumo', compact('requisicaoProdutos', 'requisicao', 'titulo', 'empresa'));
        } else {
            return redirect('requisicao')->with('status', 'Sem dados para emissão !!! ');
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
    public function unidadeResultados(Request $request)
    {
        try {
            /*
                Verifica o intervalo  de datas
            */
            $fdate = $request->inicio;
            $tdate = $request->fim;
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');

            $titulo = "Requisições por unidade em um determinado periodo";
            $requisicaos =  Requisicao::whereBetween('created_at', [$request->inicio, $request->fim])
                ->where('unidade_id', $request->unidade_id)->get();

            $requisicaoProdutos =  RequisicaoProduto::whereBetween('created_at', [$request->inicio, $request->fim])->get();
            $empresa = Empresa::all();

            // Verifica se a consulta é null
            if ($requisicaos->isEmpty()) {
                return redirect('relatorio/requisicao/unidade')->with('status', 'A busca não retornou nenhum resultado correspondente a pesquisa ');
                //se o intervalo é maior que 31 dias
            } else if ($days >= 31) {
                return redirect('relatorio/requisicao/unidade')->with('status', 'A data informada é superior a 31 dias!! ');
                //exibe o resultado
            } else {
                return view('relatorios.requisicao-por-data', compact('requisicaoProdutos', 'requisicaos', 'titulo', 'empresa'));
                // dd($requisicao);
            }
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }
}
