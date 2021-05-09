@extends('adminapp')

@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{$titulo}}</h3>


            <!--            <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>-->
        </div>

        <!-- /.box-header -->
        <div class="box-body">

            <div class="row">
                <div class="col-sm-12">


                    {!! Form::open(['url' => 'relatorioFaturamento/relatorioFaturamentoEquipamento']) !!}

                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Equipamento</label>
                                <select class="form-control select2 select2-hidden-accessible" name="equipamento_id"  style="width: 100%;" tabindex="-1" aria-hidden="true" required="true">
                                    @foreach($equipamentos as $equipamento)
                                    @if($equipamento->user_id === auth()->user()->id)
                                    <option   value="{{$equipamento->id}}"  >{{$equipamento->nome}}-{{$equipamento->codigo}}</option>
                                    @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Data Inicial</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="datepicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" name="inicial" required="true" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Data Final</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="datepicker1" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" name="final" required="true" >
                            </div>
                        </div>


                    </div>
                    <div class="col-md-12">
                        <hr/>
                        <button type="submit" class="btn btn-success" >Emitir Relatorio</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</section>
@endsection
