<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


use App\Http\Controllers\Controller;
use App\Fornecedor;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Gate;

class FornecedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (Gate::allows('View_fornecedor')) {
                $titulo = "Fornecedores ";
                $fornecedors = Fornecedor::paginate(20);
                return view('fornecedor.index', compact('fornecedors', 'titulo'));
            }else{
                return view('errors.sem_permissao');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cadastrar()
    {
        if (Gate::allows('Insert_fornecedor')) {
            $titulo = "Fornecedores ";
            return view('fornecedor.formulario', compact('titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        if (Gate::allows('Insert_fornecedor')) {
            Fornecedor::create($request->all());
            return redirect('fornecedor');
        } else {
            return view('errors.sem_permissao');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fornecedor  $Fornecedor
     * @return \Illuminate\Http\Response
     */
    public function editar(Fornecedor $fornecedor)
    {
        if (Gate::allows('Edit_fornecedor')) {
            $fornecedor = Fornecedor::findOrFail($fornecedor->id);
            $titulo = "Editar ";
            return view('fornecedor.formulario', compact('fornecedor', 'titulo'));
        } else {
            return view('errors.sem_permissao');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fornecedor  $Fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('Edit_fornecedor')) {
            $fornecedor = Fornecedor::findOrFail($id);
            $formRequest = $request->all();
            $update =  $fornecedor->update($formRequest);
            return redirect('fornecedor');
        } else {
            return view('errors.sem_permissao');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fornecedor  $Fornecedor
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        if (Gate::allows('Delete_fornecedor')) {
            $fornecedor = Fornecedor::findOrFail($id);
            $fornecedor->delete();
            return redirect('fornecedor');
        } else {
            return view('errors.sem_permissao');
        }
    }

    public function search(Request $request)
    {
        try {
            $titulo = 'Pesquisa de fornecedores com o nome de  ' . $request->get('table_search');
            if (Gate::allows('View_fornecedor')) {
                $fornecedors = new Fornecedor();
                $search = $request->get('table_search');
                $fornecedors = Fornecedor::where('nome_fornecedor', 'like', '%' . $search . '%')->paginate(10);

                return view('fornecedor.index', compact('titulo', 'fornecedors'));
            } else {
                return view('errors.404');
            }
        } catch (\Throwable $th) {
            return view('errors.404', $th);
        }
    }
}