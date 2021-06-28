<?php

namespace App\Http\Controllers;

use App\Exports\CategoriaExport;
use App\Exports\FornecedorExport;
use App\Exports\ItensLicitacaoExport;
use App\Exports\LicitacaoExport;
use App\Exports\ProdutoExport;
use App\Imports\CategoriaImport;
use App\Imports\FornecedorImport;
use App\Imports\ItensLicitacaoImport;
use App\Imports\LicitacaoImport;
use App\Imports\ProdutoImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportExcelController extends Controller
{
    /*
    IMPORT EXCEL
    */
    public function importar()
    {
        try {
            $titulo = 'Importar/exportar ';
            return view('importar.formulario', compact('titulo'));
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
    /*
        IMPORT EXCEL CATEGORIA
    */
    public function importarInsert(Request $request)
    {
        try {

            $file = $request->file('arquivo');
            Excel::import(new CategoriaImport, $file);
            return back()->with('message', 'Importado com sucesso !!!');
            // return view('importar.formulario', compact('titulo'));
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }

    /*
    EXPORT  EXCEL categoria
    */
    public function exportExcelCategoria()
    {
        try {

            return Excel::download(new CategoriaExport, 'categoria.xlsx');
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
    /*
        IMPORT EXCEL produto
    */
    public function importarProdutos(Request $request)
    {
        try {

            $file = $request->file('produto');
            Excel::import(new ProdutoImport, $file);
            return back()->with('message', 'Os produtos foram importados com sucesso!!!');
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
    /*
    EXPORT  EXCEL produto
    */
    public function   exportProdutosCategoria()
    {
        try {

            return Excel::download(new ProdutoExport, 'produtos.xlsx');
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
    /*
        IMPORT EXCEL Licitacao
    */
    public function importarLicitacao(Request $request)
    {
        try {

            $file = $request->file('licitacao');

            Excel::import(new LicitacaoImport, $file);
            return back()->with('message', 'As licitações foram importados com sucesso!!!');
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }


    /*
    EXPORT  EXCEL licitacao
    */
    public function  exportLicitacao()
    {
        try {

            return Excel::download(new LicitacaoExport, 'licitacaos.xlsx');
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
    /*
        IMPORT EXCEL FORNECEDORES
    */
    public function importarFornecedores(Request $request)
    {
        try {

            $file = $request->file('fornecedores');
            Excel::import(new FornecedorImport, $file);
            return back()->with('message', 'Importado com sucesso !!!');
            // return view('importar.formulario', compact('titulo'));
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
    /*
    EXPORT  EXCEL fornecedores
    */
    public function  exportFornecedores()
    {
        try {
            return Excel::download(new FornecedorExport, 'fornecedores.xlsx');
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }

    /*
        IMPORTAR ITENS LICITACAO
    */
    public function importarLicitacaoItens(Request $request)
    {
        try {

            $file = $request->file('licitacao_itens');

            Excel::import(new ItensLicitacaoImport, $file);
            return back()->with('message', 'Os itens das licitações foram importados com sucesso!!!');
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
    /*
    EXPORT  EXCEL itens
    */
    public function  exportLicitacaoItens()
    {
        try {

            return Excel::download(new ItensLicitacaoExport, 'licitacaosItens.xlsx');
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}
