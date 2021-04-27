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
                        @if ($requisicao->unidades->unidadesPessoa->pessoa->users->id == Auth::user()->id)
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
                                    <a href="{{ $requisicao->orcamento_um }}" title="Orçamento 1 "> <i
                                            class="fas fa-upload"></i> </a>
                                    @if ($requisicao->orcamento_dois != null)<a
                                            href="{{ $requisicao->orcamento_dois }}" title="Orçamento 2 "> <i
                                                class="fas fa-upload"></i> </a>@endif
                                    @if ($requisicao->orcamento_tres != null)<a
                                            href="{{ $requisicao->orcamento_tres }}" title="Orçamento 3 "> <i
                                                class="fas fa-upload"></i> </a>@endif


                                </td>
                                <td>
                                    <center>
                                        <span class="card bg-success"> {{ $requisicao->status }}</span>
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

                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $requisicaos->links() }}
        </div>
    </div>


@endsection
