@extends('adminapp')

@section('content')
    <div class="card">

        <div class="card-header">
            <h4 class="box-title">Configurar permissões ao usuario </h4>

        </div>

        <div class="card-body">
            <div class="col-md-12 ">

                <table class="table table-striped table-bordered">
                    <thead>
                        <th>
                            Nome de usuario:
                        </th>
                        <th>
                            E-mail:
                        </th>
                        <th>
                            Criado em:
                        </th>
                        <th>
                            Roles:
                        </th>
                    </thead>
                    <tbody>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ date('d/m/Y', strtotime($user->created_at)) }}
                        </td>
                        <td>
                            @foreach ($roles_check as $role)
                                <ul>
                                    <li>
                                        {{ $role->label }}
                                    </li>
                                </ul>
                            @endforeach
                        </td>
                    </tbody>

                </table>


            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <h4 style="text-align: center">Selecione as regras desejadas </h4>
                {!! Form::open(['url' => 'users/user_role']) !!}

                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <table class="table ">
                    <thead>
                        <tr>
                            <th width='50px'>

                            </th>
                            <th>
                                Regra
                            </th>
                            <th>
                                Detalhes
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $r)
                            @foreach ($roles_check as $role)
                                @if ($r->id == $role->id)
                                    <tr>
                                        <td align='right'><input type="radio" name="roles[]" value="{{ $r->id }}"
                                                checked></td>
                                        <td>{{ $r->name }}</td>
                                          <td>{{ $r->label }}</td>
                                    </tr>
                                    @php
                                    $role_id = $r->id;
                                    break;
                                    @endphp
                                @endif
                            @endforeach
                            @if ($r->id != $role_id)
                                <tr>
                                    <td align='right'><input type="radio" name="roles[]" value="{{ $r->id }}"></td>
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->label }}</td>
                                </tr>

                            @endif
                        @endforeach
                    </tbody>
                    <tr>

                    </tr>
                </table>


            </div>
        </div>


        <div class=" card-footer clearfix">

            <a href="{{ url('/pessoas') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>Voltar </a>
            <button type="submit" class="btn btn-success "> <i class=" fas fa-pen-alt"></i> Alterar</button>
        </div>
        {!! Form::close() !!}
    </div>

    </div>
    </section>




@endsection
