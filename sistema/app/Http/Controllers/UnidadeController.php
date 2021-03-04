<?php

namespace App\Http\Controllers;

use App\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
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


    public function show(Unidade $unidade)
    {
        //
    }

    public function edit(Unidade $unidade)
    {
        //
    }


    public function update(Request $request, Unidade $unidade)
    {
        //
    }


    public function destroy(Unidade $unidade)
    {
        //
    }
}
