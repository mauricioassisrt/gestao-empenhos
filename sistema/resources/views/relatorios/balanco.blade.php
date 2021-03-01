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

                    <div class="callout callout-info">
                        <h4>Atenção!</h4>

                        <p>Para retirar um relatorio referente a um determinado mês informe exemplo 01/01/2018 até 31/01/2018 !</p>
                    </div>
                    {!! Form::open(['url' => 'relatorioFaturamento/relatorioFaturamento']) !!}

                    <div class="form-group">

                        <div class="col-md-6">
                            <label>Data Inicial</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="datepicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" name="inicial" required="true" >
                            </div>               
                        </div>    
                        <div class="col-md-6">
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
