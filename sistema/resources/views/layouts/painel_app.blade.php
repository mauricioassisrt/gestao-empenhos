<!DOCTYPE html>
<html lang="pt-BR>"
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$titulo}}</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('/css/painel_style.css')}}">
        <link rel="stylesheet" href="{{url('/css/dashboard.css')}}">

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand sidebar-name">
                        <img src="{{url("/resources/assets/img/icon_wolf.png")}}" alt="" class="img-site"/>
                        <a href="#">Laravel 5 Acl</a>
                    </li>
                    <li class="item-list">
                        <a href="{{url('/dashboard')}}"><span class="glyphicon glyphicon-th"></span> Dashboard -></a>
                    </li>

                    @can('View_notice')
                    <li class="item-list">
                        <a href="javascript:;" data-toggle="collapse" data-target="#notices"><span class="glyphicon glyphicon-pencil"></span> Notice <span class="caret"></span></a>

                        <ul id="notices" class="collapse">
                            <li>
                                <a href="{{url('/notices')}}"><span class="glyphicon glyphicon-th-list"></span> Listar Noticias</a>
                            </li>
                            <li>
                                <a href="{{url('/notices/cadastrar')}}"><span class="glyphicon glyphicon-plus"></span> Adicionar noticias</a>
                            </li>
                        </ul>

                    </li>
                    @endcan
                    @can('View_post')
                    <li class="item-list">
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts"><span class="glyphicon glyphicon-pencil"></span> Posts <span class="caret"></span></a>
                        <ul id="posts" class="collapse">
                            <li>
                                <a href="{{url('/posts')}}"><span class="glyphicon glyphicon-th-list"></span> Listar posts</a>
                            </li>
                            <li>
                                <a href="{{url('/posts/cadastrar')}}"><span class="glyphicon glyphicon-plus"></span> Adicionar post</a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('View_user')
                    <li class="item-list">
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><span class="glyphicon glyphicon-user"></span> Usuários <span class="caret"></span></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="{{url('/users')}}"><span class="glyphicon glyphicon-th-list"></span> Listar usuários</a>
                            </li>
                            <li>
                                <a href="{{url('/users/cadastrar')}}"><span class="glyphicon glyphicon-plus"></span> Adicionar usuário</a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('View_role')
                    <li class="item-list">
                        <a href="javascript:;" data-toggle="collapse" data-target="#roles"><span class="glyphicon glyphicon-file"></span> Roles <span class="caret"></span></a>
                        <ul id="roles" class="collapse">
                            <li>
                                <a href="{{url('/acl/roles')}}"><span class="glyphicon glyphicon-th-list"></span> Listar roles</a>
                            </li>
                            <li>
                                <a href="{{url('/acl/role_cadastrar')}}"><span class="glyphicon glyphicon-plus"></span> Adicionar roles</a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('View_permission')
                    <li class="item-list">
                        <a href="javascript:;" data-toggle="collapse" data-target="#per"><span class="glyphicon glyphicon-warning-sign"></span> Permissions <span class="caret"></span></a>
                        <ul id="per" class="collapse">
                            <li>
                                <a href="{{url('/acl/permissions')}}"><span class="glyphicon glyphicon-th-list"></span> Listar permissions</a>
                            </li>
                            <li>
                                <a href="{{url('/acl/permission_cadastrar')}}"><span class="glyphicon glyphicon-plus"></span> Adicionar permissions</a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    <li class="sidebar-brand sidebar-user">
<!--                        <img src="{{url("/resources/assets/img/user.jpg")}}" width="180px" alt="" class="img-user img-circle"/>-->
                        <a href="#" class="user-font"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a>
                        <a href="{{url('/logout')}}" class="user-font"><span class="glyphicon glyphicon-off"></span> Sair</a>
                    </li>
                </ul>
            </div>
            <a href="#menu-toggle" class="btn btn-default btn-toggle" id="menu-toggle"><span class="glyphicon glyphicon-menu-left"></span></a>
            <!-- /#sidebar-wrapper -->


            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="page-header">
                        <h1>{{$titulo}} <small></small></h1>
                    </div>
                    @yield('content')
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>

        <!-- /#wrapper -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- Menu Toggle Script -->
        <script>
$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    $(this).find('span').toggleClass('glyphicon glyphicon-menu-left').toggleClass('glyphicon glyphicon-menu-right');
});
        </script>

    </body>
</html>
