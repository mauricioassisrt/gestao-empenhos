@extends('adminapp')
@section('topo')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href=" {{ asset('css/select2.min.css') }}" />

    <link rel="stylesheet" href=" {{ asset('css/select2-bootstrap4.min.css') }}" />
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">


            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))
                {!! Form::model($produto, ['method' => 'PATCH', 'url' => 'produto/update/' . $produto->id]) !!}
            @else
                {!! Form::open(['url' => 'produto/insert']) !!}
            @endif
            <div class="form-group">

                <label>Nome do produto</label>
                <input type="text" class="form-control" placeholder="Arroz, Feijão" name="nome" @if (Request::is('*/editar/*')) value="{{ $produto->nome }}" @endif required>

            </div>
            <div class="form-group">

                <label>Lote</label>
                <input type="number" class="form-control" placeholder="545040" name="lote" @if (Request::is('*/editar/*')) value="{{ $produto->lote }}" @endif required>

            </div>
            <div class="form-group">

                <label>Descrição</label>
                <input type="text" class="form-control" placeholder="Arroz de 5 kg pacote , etc" name="descricao" @if (Request::is('*/editar/*')) value="{{ $produto->descricao }}" @endif required>

            </div>


            <div class="form-group">
                <label>Categoria</label>
                <select name="categoria_id" class="form-control select2" style="width: 100%;">
                    @if (Request::is('*/editar/*'))
                        <option value="{{ $produto->categoria->id }}">
                            {{ $produto->categoria->nome_categoria }}
                        </option>
                        @foreach ($categorias as $categoria)
                            @if ($produto->categoria->id != $categoria->id)
                                <option value="{{ $categoria->id }}">
                                    {{ $categoria->nome_categoria }}
                                </option>
                            @endif

                        @endforeach
                    @else
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nome_categoria }}
                            </option>
                        @endforeach
                    @endif
                </select>
                <input type="text" id="test">
            </div>


        </div>
        <div class="card-footer clearfix">

            <a href="{{ url('/produto') }}" class="btn btn-primary">

                <i class="fas fa-arrow-left"></i> Voltar </a>

            @if (Request::is('*/editar/*'))
                <button type="submit" class="btn btn-success"> <i class=" fas fa-pen-alt"></i> Alterar</button>
            @else
                <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Salvar</button>
            @endif

        </div>
        {!! Form::close() !!}
    </div>
    </div>
    </div>


@section('rodape')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $(function(){
            // turn the element to select2 select style
            $('.select2').select2({
              placeholder: "Select a state"
            });

            $('.select2').on('change', function() {
              var data = $(".select2 option:selected").text();
              $("#test").val(data);
            })
          });
    </script>
@endsection

@endsection
