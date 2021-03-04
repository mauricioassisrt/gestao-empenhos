<?php

namespace App\Http\Controllers;

use App\Secretaria;
use Illuminate\Http\Request;

class SecretariaController extends Controller
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


    public function show(Secretaria $secretaria)
    {
        //
    }


    public function edit(Secretaria $secretaria)
    {
        //
    }

    public function update(Request $request, Secretaria $secretaria)
    {
        //
    }

    public function destroy(Secretaria $secretaria)
    {
        //
    }
}
