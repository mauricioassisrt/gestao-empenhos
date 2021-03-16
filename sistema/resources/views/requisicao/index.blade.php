@extends('adminapp')

@section('content')
    <div class="card">

        <div class="card-header">


            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @can('insert_requisicao')
                <a href="{{ url('requiscao/cadastrar') }}" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Novo </a>


                <form action="{{ url('/requisicao/search') }}" method="get">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">

                            <input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>


                        </div>
                    </div>
                @endcan
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">

                <thead>
                    <tr>

                        <th>
                            #
                        </th>
                        <th>
                            Unidade
                        </th>
                        <th>
                            Data da Requisicao
                        </th>
                        <th>
                            Responsável
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Ações
                        </th>

                    </tr>
                </thead>
                <tbody>

                    <tr>

                        <td>
                            UBS CENTRO
                        </td>
                        <td>
                            10/02/2021
                        </td>
                        <td>
                            Pessoa Responsável
                        </td>
                        <td>
                            Deferido
                        </td>
                        <td>
                            Botões
                        </td>

                    </tr>


        </div>
        <div class="card-footer clearfix">
            {{ $requisicao->links() }}
        </div>
    </div>


@endsection
