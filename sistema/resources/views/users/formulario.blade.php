@extends('adminapp')

@section('content')

       <!--dentro do formulario -->
       <div class="card">

        <div class="card-header">
         Detalhes
        </div>
        <div class="card-body">

        <!-- /.box-header -->
                    @if(Request::is('*/editar/*'))
                    {!! Form::model($user, ['method' => 'PATCH', 'url' => 'users/update/'.$user->id]) !!}
                    @else
                     {!! Form::open(['url' => 'users/insert']) !!}
                    @endif
                    <div class="form-group">
                        @csrf
                        <label>Nome</label>
                        <input type="text" class="form-control" id="name" placeholder="Digite o nome do usuário." name="name" @if(Request::is('*/editar/*')) value="{{$user->name}}" @endif required>

                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" placeholder="Digite o e-mail do usuario." id="email" name="email" @if(Request::is('*/editar/*')) value="{{$user->email}}" @endif required>

                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" placeholder="Digite a senha do usuario." id="password" name="password" required>

                    </div>
                    <div class="form-group">
                        <label>Confirmar a senha</label>
                        <input type="password" class="form-control" id="password-confirm" name="password-confirm" required placeholder="Comfirme a senha.">

                    </div>




        </div>
        <div class="card-footer clearfix">
            @can('View_user')
            <a href="{{url('/users')}}" class="btn btn-primary">

                <i class="fas fa-arrow-left"></i> Voltar </a>
            @endcan
            @if(Request::is('*/editar/*'))
            <button type="submit" class="btn btn-success">  <i class=" fas fa-pen-alt"></i>  Alterar</button>
            @else
            <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Salvar</button>
            @endif

        </div>
        {!! Form::close() !!}
       </div>

@endsection
