<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Fornecedor $fornecedor)
    {
        //
    }


    public function edit(Fornecedor $fornecedor)
    {
        //
    }


    public function update(Request $request, Fornecedor $fornecedor)
    {
        //
    }


    public function destroy(Fornecedor $fornecedor)
    {
        //
    }
}
