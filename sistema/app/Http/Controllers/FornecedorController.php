<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


use App\Http\Controllers\Controller;
use App\Fornecedor;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class FornecedorController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $titulo = "Fornecedores ";
            $fornecedors = Fornecedor::paginate(20);
            return view('fornecedor.index', compact('fornecedors', 'titulo'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function cadastrar()
    {
        $titulo = "Fornecedores ";
        return view('fornecedor.formulario', compact('titulo')) ;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        Fornecedor::create($request->all());
        return redirect('fornecedor');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fornecedor  $Fornecedor
     * @return \Illuminate\Http\Response
     */
    public function editar(Fornecedor $fornecedor)
    {
        $fornecedor = Fornecedor::findOrFail($fornecedor->id);
        $titulo = "Editar ";
        return view('fornecedor.formulario', compact('fornecedor', 'titulo'));
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
        $fornecedor = Fornecedor::findOrFail($id);
        $formRequest = $request->all();
        $update =  $fornecedor->update($formRequest);

        return redirect('fornecedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fornecedor  $Fornecedor
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();
        return redirect('frnecedor');
    }
}
