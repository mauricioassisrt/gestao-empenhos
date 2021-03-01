@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href="/css/tempusdominus-bootstrap-4.min.css">
    <!-- toast CSS-->
    <link rel="stylesheet" href="/css/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">

            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))

                {!! Form::model($pessoa, ['method' => 'PATCH', 'url' => 'pessoas/update/' . $pessoa->id]) !!}

            @else
                <form action="{{ url('pessoas/insert') }}" method="post" enctype="multipart/form-data">

            @endif
            <div class="row">

                <div class="image col-sm-3 text-center">


                        @if (Request::is('*/editar/*'))
                        <img   @if (Request::is('*/editar/*'))
                        src="/{{ $pessoa->foto_pessoa  }}" @endif class="brand-image img-circle elevation-3" alt="User Image"
                            width="60px" height="60px" >
                        @else
                        @csrf
                        <img src="/../img/empresa/user.png "  class="brand-image img-circle elevation-3" alt="User Image"
                        width="40px" height="40px" >
                        @endif
                    <div class="form-group">
                        <label for="exampleInputFile">FOTO </label>
                        <div class="input-group" width="2px">
                            <input type="file" name="foto_pessoa" id="" required> <br>
                        </div>
                    </div>
                </div>


                <div class="col-sm-9">

                    <div class="row">
                        <div class="col-sm-3 ">
                            <label>Nome completo</label>
                            <input type="text" name="name" class=" form-control form-control-border"  @if (Request::is('*/editar/*'))
                            value="{{ $pessoa->name  }}" @endif required>

                        </div>
                        <div class="col-sm-3 ">
                            <!-- Date -->
                            <div class="form-group">
                                <label>Data de nascimento :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="data_nascimento" placeholder="dia-mes-ano" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask  @if (Request::is('*/editar/*'))
                                    value="{{ date('d/m/Y', strtotime($pessoa->data_nascimento )) }}" @endif>
                                  </div>
                            </div>

                            <!-- /.form group -->
                        </div>
                        <div class="col-sm-3">
                            <label>Sexo</label>
                            <select class="custom-select " name="sexo">
                                <option value="f">Feminino </option>
                                <option value="m">Masculino </option>
                                <option value="n">Prefiro não dizer</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Contato </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" name="celular" data-inputmask="'mask': ['(99) 9 9999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" inputmode="text"  @if (Request::is('*/editar/*'))
                                value="{{ $pessoa->celular  }}" @endif>
                            </div>
                        </div>
                        {{-- <input type="hidden" name="user_id" value="" />
                        --}}
                    </div>

                    <hr>
                    <div class="  callout callout-success ">
                        <h5><b>Atenção !!!</b> </h5>

                        <p> As informações a seguir são recorrentes ao login de acesso ao sistema deste modo preste grande
                            atenção !</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">

                            <label>E-mail: <b class="text-danger">*</b></label></label>
                            <input type="email" class="form-control" placeholder="Digite o e-mail do usuario." id="email"
                                name="email" @if (Request::is('*/editar/*'))
                            value="{{ $pessoa->users->email  }}" @endif required>
                            <input type="hidden" name="pessoa_id" id="pessoa_id" @if (Request::is('*/editar/*'))
                            value="{{ $pessoa->id }}" @endif >

                            <input type="hidden" name="user_id" id="user_id" @if (Request::is('*/editar/*'))
                            value="{{ $pessoa->users->id }}" @endif >
                        </div>
                        @if(Request::is('*/editar/*'))
                        <div class="col-sm-3">
                            <label>Senha Anterior  :<b class="text-danger">*</b></label></label>
                            <input type="password" name="senha_antiga"  id="enviarSenha"  class="form-control senhaAntiga" placeholder="Digite cadastrada anteriormente ."
                                   required>

                        </div>
                        <div class="col-sm-3">
                            <label>Nova senha :<b class="text-danger">*</b></label></label>
                            <input type="password" class="form-control  verificaSenha" id="password" name="password"
                                required placeholder="Nova senha.">

                        </div>
                        <div class="col-sm-3">
                            <label>Repita a senha :<b class="text-danger">*</b></label></label>
                            <input type="password" class="form-control  verificaSenha" id="password-confirm" name="password-confirm"
                                required placeholder="Comfirme a senha.">

                        </div>
                        @else
                        <div class="col-sm-4">
                            <label>Senha :<b class="text-danger">*</b></label></label>
                            <input type="password" class="form-control" placeholder="Digite a senha do usuario."
                                id="password" name="password"  required>

                        </div>
                        <div class="col-sm-4">
                            <label>Repita a senha :<b class="text-danger">*</b></label></label>
                            <input type="password" class="form-control  verificaSenha" id="password-confirm" name="password-confirm"
                                required placeholder="Comfirme a senha.">

                        </div>

                        @endif

                    </div>

                </div>
            </div>

        </div>

        <div class="card-footer clearfix">
            @can('pessoa_view')
                <a href="{{ url('/pessoas') }}" class="btn btn-primary">

                    <i class="fas fa-arrow-left"></i> Voltar </a>
            @endcan
            @if (Request::is('*/editar/*'))
                <button type="submit" class="btn btn-success"  id="botaoSalvarUser" style="display:none"> <i class=" fas fa-pen-alt"></i> Alterar</button>
            @else
                <button type="submit" class="btn btn-success" id="botaoSalvarUser" style="display:none"> <i class=" fas fa-save"></i> Salvar</button>
            @endif

        </div>
        {!! Form::close() !!}
    </div>


@section('rodape')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <!-- CALENDARIo-->
    <script src="/js/moment.min.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- mask de telefone -->
    <script src="/js/jquery.inputmask.min.js"></script>

    <!-- TOAST SWEETALERT -->
    <script src="/js/sweetalert2.all.js"></script>
    <script src="/js/toastr.min.js"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <script type="text/javascript">
        //chama a mascara do campo de telefone
        $('[data-mask]').inputmask();
          //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        {{-- $(function() {
            //Date range picker CALENDARIO
            $('#reservationdate').datetimepicker({
                format: 'L',
                format: 'DD/MM/YYYY',
            });

        }); --}}

        //funcao verifica senhas iguais no front-end
        $(".verificaSenha").blur(function() {

            senha1 = $("#password").val();
            senha2 = $("#password-confirm").val();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            if (!senha1 || !senha2) {
                toastr.warning('Digite uma senha antes de processeguir  !!!!')

                $("#botaoSalvarUser").hide();

            } else if ((!senha1 && !senha2) || senha1 == senha2) {

                toastr.success('Senhas são iguais!!!!')

                $("#botaoSalvarUser").show();
            } else {
                toastr.error('Senhas são diferentes !!!!')

                $("#botaoSalvarUser").hide();

            }
            senha1 = "";
            senha2 = "";

        });
        // fim da função


            $('#enviarSenha').blur(function(e) {

                senha1 = $(".senhaAntiga").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('pessoas/carregaSenha') }}",
                    method: "POST",
                    data: {
                        user_id: $("#user_id").val(),
                        senha_antiga: $(".senhaAntiga").val(),
                    },

                    success: function (result) {
                        toastr.success('Senhas são iguais!!!!'+result.success);
                     }
                });

            });


    </script>
@endsection

@endsection
