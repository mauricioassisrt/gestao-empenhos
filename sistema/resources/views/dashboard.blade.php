@extends('adminapp')

@section('content')

    <div class="card">

        <div class="card-header">

            <div class="row">
                @can('finalizar_requisicao')


                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-file-invoice"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Aguardando finalização </span>
                                <span class="info-box-number">{{ $requisicaos->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-calendar-check"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Finalizadas </span>
                                <span class="info-box-number">{{ $requisicaos_finalizadas }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                @endcan
                @can('atualizar_reduzido')

                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fas fa-fast-forward"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Aguardando encaminhar para empenho  </span>
                                <span class="info-box-number">{{ $requisicaos->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning "><i class="fas fa-book"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Enviada para empenho </span>
                                <span class="info-box-number">{{ $requisicaos_empenhadas }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                @endcan
            </div>


            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @can('Insert_requisicao')
                {{-- <a href="{{ url('requisicao/cadastrar') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Novo </a> --}}
            @endcan
            @can('search_requisicao')


                <form action="{{ url('/requisicao/search') }}" method="get">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">

                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Pesquisar">

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
                        Secretaria/Unidade
                    </th>
                    <th>
                        Data da Requisicao
                    </th>
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
                    <tr>

                        <td>
                            {{ $requisicao->id }}
                        </td>
                        <td>
                            {{ $requisicao->unidades->secretaria->nome }}/ {{ $requisicao->unidades->nome }}
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
                                    <span class="card bg-teal color-palette "> {{ $requisicao->status }}</span>
                                @endif
                                @if ($requisicao->status == 'Finalizado')
                                    <span class="card bg-info "> {{ $requisicao->status }}</span>
                                @endif


                            </center>
                        </td>


                        <td>
                            <a href="{{ url('requisicao/editar/' . $requisicao->id) }}" class="btn btn-primary"><span
                                    class="glyphicon glyphicon-pencil">
                                    </span>
                                <i class="fas fa-info-circle"></i> Detalhes da Requisição </a>


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
