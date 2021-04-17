@extends('adminapp')

@section('content')
    <div class="card">

        <div class="card-header">


            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @can('Insert_requisicao')
                {{-- <a href="{{ url('requisicaoComLicitacao/cadastrar') }}" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Novo </a> --}}
            @endcan

            @can('search_requisicao')


                <form action="{{ url('/requisicaoComLicitacao/search') }}" method="get">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">

                            <input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>


                        </div>
                    </div>

            </form>
            @endcan
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
                    @foreach ($requisicaos as $requisicao)
                        <tr>

                            <td>
                                {{ $requisicao->id }}
                            </td>
                            <td>
                                {{ $requisicao->unidades->nome }}
                            </td>
                            <td>
                                {{ date('d/m/Y ', strtotime($requisicao->created_at)) }}
                            </td>
                            <td>
                                {{ $requisicao->pessoaUnidade->pessoa->name }}
                            </td>
                            <td>

                            </td>
                            <td>
                                @can('Edit_requisicao')

                                    <a href="{{ url('requisicaoComLicitacao/editar/' . $requisicao->id) }}"
                                        class="btn btn-primary"><span class="glyphicon glyphicon-pencil">
                                        </span>
                                        <i class="fas fa-edit"></i> Editar </a>
                                @endcan
                                <a href="" class="btn btn-primary"><span class="glyphicon glyphicon-pencil">
                                    </span>
                                    <i class="fas fa-next"></i> Realizar andamento </a>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $requisicaos->links() }}
        </div>
    </div>


@endsection
