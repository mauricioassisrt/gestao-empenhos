@extends('adminapp')
@section('topo')


<link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
<!-- toast CSS-->
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<link rel="stylesheet" href=" {{ asset('css/select2.min.css') }}" />
<!--Select2 -->
<link rel="stylesheet" href=" {{ asset('css/select2-bootstrap4.min.css') }}" />

<meta name="csrf-token" content="{{ csrf_token() }}">


@endsection
@section('content')
<div class="card">

    <div class="card-header">



        @can('Insert_requisicao')
        {{-- <a href="{{ url('requisicao/cadastrar') }}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i> Novo </a> --}}
        @endcan
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

                @if ($requisicao->status != 'Indeferido' && $requisicao->status != 'Enviado')
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
                        <a href="{{ $requisicao->orcamento_um }}" title="Orçamento 1 "> <i class="fas fa-upload"></i> </a>
                        @else
                        Sem arquivo vinculado
                        @endif
                        @if ($requisicao->orcamento_dois != null)<a href="{{ $requisicao->orcamento_dois }}" title="Orçamento 2 "> <i class="fas fa-upload"></i> </a>@endif
                        @if ($requisicao->orcamento_tres != null)<a href="{{ $requisicao->orcamento_tres }}" title="Orçamento 3 "> <i class="fas fa-upload"></i> </a>@endif


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
                        <a href="{{ url('requisicao/editar/' . $requisicao->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil">
                            </span>
                            <i class="fas fa-info-circle"></i> Detalhes da Requisição </a>


                        @if ($requisicao->status == 'Finalizado')
                        <a href="{{ url('relatorio/requisicao/resumo/' . $requisicao->id) }}" class="btn btn-primary"><span>
                            </span>
                            <i class="fas fa-print"></i> Imprimir </a>

                        @endif


                    </td>

                </tr>
                @endif
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $requisicaos->links() }}
    </div>
</div>


@section('rodape')
<!-- TOAST SWEETALERT -->
<script src=" {{ asset('js/sweetalert2.all.js') }}"></script>
<script src=" {{ asset('js/toastr.min.js') }}"></script>
<!-- FIM TOAST SWEETALERT  -->
<script>
    //toast alert
    @if(session('status'))

    toastr.success("{{ session()->get('status') }}");

    @endif

</script>

@endsection
@endsection
