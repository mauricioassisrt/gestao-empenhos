
@extends('adminapp')

@section('content')
<style type="text/css">
    #mymap {

        width: 100%;
        height: 500px;
    }
</style>



<section class="content">

    <div class="box box-primary">

        <div class="box-header with-border">
            <span class="glyphicon glyphicon-scale">
                <h3 class="box-title ">Painel Principal </h3>
            </span>

        </div>

        <div class="box-header">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                    <div class="alert alert-warning">
                        <strong>ATENÇÃO!</strong> {{$errors->first()}}
                    </div>

                    @endif
                    <div class="row">
                        @if(Session::has('autentica_ok'))
                        <div class="col-md-12">

                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Autenticado!</h4>
                                {{Session::get('autentica_ok')}}
                            </div>

                        </div>
                        @endif
                       

                       
                        
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <span class="glyphicon glyphicon-file gi-4x pull-left"></span><h2 class="text-center">Funções <span class="label label-info">{{$total_roles}}</span></h2>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="" class="link_chamada">Ver Funções <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                       
                       
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <span class="glyphicon glyphicon glyphicon-home"></span><h2 class="text-center">Empresas <span class="label label-info"></span></h2>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="" class="link_chamada">Ver  VISAO EMPRESA<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                        


                    </div>
                    
                  



                </div>
            </div>
        </div>

    </div>
</section>
@endsection
