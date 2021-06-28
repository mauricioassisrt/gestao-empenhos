<?php

namespace App\Http\Controllers;

use App\Empresa;
use Gate;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editar()
    {

        try {
            if (Gate::allows('empresa_view')) {
                $empresa = Empresa::all();
                $titulo = "Dados da empresa ";
                return view('empresa.form', compact('empresa', 'titulo'));
            } else {
                $titulo = "SEM ACESSO ";

                return view('errors.404', compact('titulo'));
            }
        } catch (\Throwable $th) {
            return view('errors.404', compact('titulo'));
        }
    }

    public function atualizar(Request $request)
    {
        try {

            $empresa = Empresa::findOrFail($request->id);
            $titulo = "Dados da empresa ";


            if ($request->hasFile('foto_input')) {
                $image = $request->file('foto_input');

                $dir = "img/empresa";
                $extencao = $image->guessClientExtension();
                $nomeImagem = "empresa" . "." . $extencao;
                $image->move($dir, $nomeImagem);
                $imageSalvar = $dir . "/" . $nomeImagem;

                $empresa->foto_caminho = $imageSalvar;

                $empresa->update($request->all());

                return redirect('empresa');

            }

        } catch (\Throwable $th) {
            $titulo = "SEM ACESSO ";
            dd($th);
            return view('errors.404', compact('titulo'));
        }
    }
}
