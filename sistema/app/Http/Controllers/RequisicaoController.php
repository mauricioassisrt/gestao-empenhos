<?php

namespace App\Http\Controllers;

use App\Requisicao;
use Illuminate\Http\Request;

class RequisicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        dd('no request');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Requisicao $requisicao)
    {
        //
    }

    public function edit(Requisicao $requisicao)
    {
        //
    }

    public function update(Request $request, Requisicao $requisicao)
    {
        //
    }


    public function destroy(Requisicao $requisicao)
    {
        //
    }
}
