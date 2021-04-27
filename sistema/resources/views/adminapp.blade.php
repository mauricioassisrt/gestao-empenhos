@php
//GET DADOS DA EMPRESA E CARREGA EM TODAS AS PAGINAS
use App\Empresa;
$empresa = Empresa::all();
@endphp
<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> {{ $titulo }}</title>
    {{-- <link rel="shortcut icon" href="{{ url('https://img.icons8.com/cotton/2x/workers-male.png') }}"> --}}
    <link rel="stylesheet" href=" {{ asset('css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('topo')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <a class="nav-link" href="{{ asset('logout') }}">
                    Sair <i class="fas fa-sign-in-alt"></i>

                </a>

                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-dark-red">
            <!-- Brand Logo -->
            <a href="" class="brand-link navba-dark-white">
                <img src="/{{ $empresa[0]->foto_caminho }}" class="brand-image img-circle elevation-3"
                    style="width: 30px; height: 30px;">
                <span class="brand-text font-weight-light">
                    <h6>{{ $empresa[0]->nome_fantasia }}</h6>
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                        <img src="/{{ Auth::user()->find(Auth::user()->id)->pessoas()->first()->foto_pessoa }}"
                            class="img-circle elevation-2" style="width: 30px; height: 30px;">
                    </div>
                    <div class="info">
                        <a href="{{ url('pessoas/editar/' . Auth::user()->id) }}"
                            class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-close">
                            <a href="{{ url('/home') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>
                        </li>
                        @can('Insert_requisicao')
                            <li class="nav-item has-treeview menu-close">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas  fa-file-invoice"></i>
                                    <p>
                                        Requisições
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ url('requisicao/cadastrar') }}" class="nav-link active">
                                            <i class="nav-icon fas fa-file-prescription"></i>
                                            <p>
                                                Sem licitação Vinculada
                                            </p>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="{{ url('requisicaoComLicitacao/cadastrar') }}" class="nav-link active">
                                            <i class="nav-icon fas fa-gavel"></i>
                                            <p>
                                                Com licitação vinculada
                                            </p>
                                        </a>
                                    </li>

                                    @can('minhas_requisicoes')
                                        <li class="nav-item">
                                            <a href="{{ url('requisicao') }}" class="nav-link active">
                                                <i class="nav-icon fas fa-receipt"></i>
                                                <p>
                                                    Requisições da unidade
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    {{-- @can('Edit_requisicao')
                                <li class="nav-item">

                                        <a href="{{ url('requisicao') }}" class="nav-link active">
                                            <i class="nav-icon fas fa-file-invoice"></i>
                                            <p>
                                                Todas as Requisições
                                            </p>
                                        </a>


                                </li>
                                @endcan --}}
                                </ul>
                                </a>
                            </li>
                        @endcan
                        @can('secretario_municipal_aprova_requisicao')

                            <li class="nav-item has-treeview menu-close">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas   fa-university nav-icon"></i>
                                    <p>
                                        Secretaria
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ url('requisicao') }}" class="nav-link active">
                                            <i class="nav-icon fas fa-dolly"></i>
                                            <p>
                                                Requisições Realizadas
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        @endcan
                        @can('View_LicitacaoProduto')
                            <li class="nav-item has-treeview menu-close">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas  fa-gavel"></i>
                                    <p>
                                        Licitações
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('licitacao.vincular') }}" class="nav-link active">
                                            <i class="nav-icon fas fa-folder-plus"></i>
                                            <p>
                                                Vincular produtos
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        @can('View_licitacao')
                                            <a href="{{ url('/licitacao') }}" class="nav-link active">
                                                <i class="fas fa-gavel nav-icon"></i>
                                                <p>Cadastro de Licitação</p>
                                            </a>
                                        @endcan
                                    </li>
                                </ul>

                                </a>
                            </li>

                        @endcan

                        @can('View_categoria')
                            <li class="nav-item has-treeview menu-close">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Cadastros
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        @can('View_secretaria')
                                            <a href="{{ url('secretaria') }}" class="nav-link active">
                                                <i class="fas fa-university nav-icon"></i>
                                                <p>Secretaria</p>

                                            </a>
                                        @endcan
                                        @can('View_unidade')
                                            <a href="{{ url('unidade') }}" class="nav-link active">
                                                <i class="fas fa-archway nav-icon"></i>
                                                <p>Unidade</p>

                                            </a>
                                        @endcan

                                        @can('View_categoria')
                                            <a href="{{ url('categoria') }}" class="nav-link active">
                                                <i class="fas fa-boxes nav-icon"></i>
                                                <p>Categoria</p>

                                            </a>
                                        @endcan
                                        @can('View_produto')
                                            <a href="{{ url('produto') }}" class="nav-link active">
                                                <i class="fas fa-box nav-icon"></i>
                                                <p>Produto</p>

                                            </a>
                                        @endcan

                                        @can('View_fornecedor')
                                            <a href="{{ url('fornecedor') }}" class="nav-link active">
                                                <i class="fas fa-building nav-icon"></i>
                                                <p>Fornecedores</p>

                                            </a>
                                        @endcan
                                        @can('pessoa_view')
                                            <a href="{{ route('pessoa') }}" class="nav-link active">
                                                <i class="fas fa-user-friends nav-icon"></i>
                                                <p>Pessoas </p>
                                            </a>

                                            </a>
                                        @endcan

                                        @can('View_licitacao')
                                            <a href="{{ url('/licitacao') }}" class="nav-link active">
                                                <i class="fas fa-gavel nav-icon"></i>
                                                <p>Licitação</p>
                                            </a>
                                        @endcan
                                        @can('View_role')
                                            <a href="{{ url('/acl/roles') }}" class="nav-link active">
                                                <i class="fas fa-file nav-icon"></i>
                                                <p>Funções</p>

                                            </a>
                                        @endcan
                                        @can('View_permission')
                                            <a href="{{ url('/acl/permissions') }}" class="nav-link active">
                                                <i class="fas fa-check-square nav-icon"></i>
                                                <p>Permissões</p>
                                            </a>

                                            </a>
                                        @endcan


                                    </li>

                                </ul>

                            </li>
                        @endcan
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Configurações
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    @can('empresa_view')
                                        <a href="{{ url('/empresa') }}" class="nav-link active">
                                            <i class="fas fa-sitemap nav-icon"></i>
                                            <p>Dados da Prefeitura </p>
                                        </a>

                                        </a>
                                    @endcan
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('pessoas/editar/' . Auth::user()->id) }}"
                                        class="nav-link active">
                                        <i class="nav-icon fas fa-info"></i>
                                        <p>
                                            Meus dados

                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-file-pdf"></i>
                                <p>
                                    Relatórios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('relatorio/requsicao/periodo') }}" class="nav-link active">
                                        <i class="fas fa-calendar-alt nav-icon"></i>
                                        <p>Requisições por data </p>
                                    </a>



                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('relatorio/requisicao/unidade') }}" class="nav-link active">
                                        <i class="fas fa-archway nav-icon"></i>
                                        <p>Quantitativo Requisições </p>
                                    </a>
                                </li>
                                @can('Edit_requisicao')
                                    <li class="nav-item">

                                        <a href="{{ url('requisicao') }}" class="nav-link active">
                                            <i class="nav-icon fas fa-file-invoice"></i>
                                            <p>
                                                Todas as Requisições
                                            </p>
                                        </a>


                                    </li>
                                @endcan
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <section class="content">
                    <section class="content-header">
                        <h4>{{ $titulo }}</h4>
                    </section>
                    <main class="py-12">

                        <!--dentro do template -->
                        @yield('content')
                    </main>
                    <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    {{-- <footer class="main-footer">
        <div class=" text-center" style="font-size: 9px">

            {{ $empresa[0]->nome_fantasia }} - Copyright &copy; 2020 - {{ date('Y') }} <br>
            CNPJ {{ $empresa[0]->cnpj }}, Contato: {{ $empresa[0]->contato }}, E-mail: {{ $empresa[0]->email }}<br />
            Endereço:{{ $empresa[0]->endereco }}, Nº {{ $empresa[0]->numero }} Bairro:{{ $empresa[0]->bairro }},
            CEP:{{ $empresa[0]->cep }}

        </div>
    </footer> --}}
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src=" {{ asset('js/app.js') }}"></script>


    <script src=" {{ asset('js/jquery.form.min.js') }}"></script>
    <!-- FECHAR DIALOG -->
    <script type="text/javascript">
        setTimeout(function() {
            $('#dialog').fadeOut('fast');
        }, 2000);

    </script>
    @yield('rodape')


</body>

</html>
