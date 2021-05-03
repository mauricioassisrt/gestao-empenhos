<?php

namespace App\Http\Controllers;

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
    public function requisicaoResumo()
    {
        try {

            $requisicao = Requisicao::all();

            return \PDF::loadView('relatorios.requisicao-resumo')->download('nome-arquivo-pdf-gerado.pdf');
        } catch (\Throwable $th) {

            return view('errors.404', $th);
        }
    }
}
