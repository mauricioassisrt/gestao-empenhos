@extends('adminapp')

@section('content')
    <div class="card">

        <div class="card-header">


            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif



            @can('search_requisicao')
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
            @if ($pessoaUnidades != null)
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
                            {{-- <th>
                            Responsável
                        </th> --}}
                            <th>
                                Arquivos
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
                            @foreach ($pessoaUnidades as $pessoaUnidade)
                                @if ($requisicao->unidades->id == $pessoaUnidade->unidade_id)
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
                                            @if ($requisicao->orcamento_um != null)
                                                <a href="{{ $requisicao->orcamento_um }}" title="Orçamento 1 "> <i
                                                        class="fas fa-upload"></i> </a>
                                            @else
                                                Sem arquivo vinculado
                                            @endif
                                            @if ($requisicao->orcamento_dois != null)<a
                                                    href="{{ $requisicao->orcamento_dois }}" title="Orçamento 2 "> <i
                                                        class="fas fa-upload"></i> </a>@endif
                                            @if ($requisicao->orcamento_tres != null)<a
                                                    href="{{ $requisicao->orcamento_tres }}" title="Orçamento 3 "> <i
                                                        class="fas fa-upload"></i> </a>@endif



                                        </td>
                                        <td>
                                            <center>
                                                @if ($requisicao->status == 'Indeferido')
                                                    <span class="card bg-danger"> {{ $requisicao->status }} <br>Motivo
                                                        {{ $requisicao->status_justificativa }}</span>
                                                @endif
                                                @if ($requisicao->status == 'Enviado')
                                                    <span class="card bg-default"> {{ $requisicao->status }}</span>
                                                @endif
                                                @if ($requisicao->status == 'Deferido')
                                                    <span class="card bg-success"> {{ $requisicao->status }}</span>
                                                @endif
                                                @if ($requisicao->status == 'Empenho')
                                                    <span class="card bg-warning "> {{ $requisicao->status }}</span>
                                                @endif
                                                @if ($requisicao->status == 'Contabilidade')
                                                    <span class="card bg-teal color-palette ">
                                                        {{ $requisicao->status }}</span>
                                                @endif
                                                @if ($requisicao->status == 'Finalizado')
                                                    <span class="card bg-info "> {{ $requisicao->status }}</span>
                                                @endif


                                            </center>
                                        </td>

                                        <td>
                                            <a href="{{ url('requisicao/editar/' . $requisicao->id) }}"
                                                class="btn btn-primary"><span class="glyphicon glyphicon-pencil">
                                                </span>
                                                <i class="fas fa-info-circle"></i> Detalhes da Requisição </a>


                                        </td>

                                    </tr>
                                @endif

                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="card-header">

                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Atenção!</h5>
                        Ainda não foram feitas requisições
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer clearfix">
            {{ $requisicaos->links() }}
        </div>
    </div>


@endsection
