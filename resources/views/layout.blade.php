<!DOCTYPE html>
<html>
    <head>
        <title>Classificados Fácil</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col header" style="height: 170px;padding-top: 30px">
                    <h1 class="display-3"><a href="/">Classificados Fácil</a></h1>
                    <p class="display-6">Gerenciamento de classificados de maneira simples.</p>
                </div>
                <div class="col text-center">
                    <br><br>
                    @if(\Auth::user())
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ \Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Editar informações</a>
                                <a class="dropdown-item" href="#">Acompanhar classificados</a>
                                <a class="dropdown-item" href="#">Postar classificado</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('logout') }}">Sair</a>
                            </div>
                        </div>
                    @else
                        <a href="{{ url('login') }}" class="btn btn-primary">Logar no sistema</a> 
                    @endif
                    
                    
                </div>
            </div>
        </div>
        <div class="menu-bg" style="background: #343a40">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
                                </li>
                                @foreach(\App\Models\ClassifiedCategory::getAll() as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('category/'.$category->id) }}">{{ $category->name }}</a>
                                </li>
                                @endforeach
                                

                                </ul>
                                <form class="form-inline my-3 my-lg-0" method="POST" action="{{ url('search') }}">
                                    {{ csrf_field() }}
                                    <input name="pesquisa" class="form-control mr-sm-2" type="text" placeholder="Digite sua pesquisa aqui" aria-label="Pesquisar">
                                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Pesquisar</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <br>
                    @include('widgets.callout')
                    @yield('content')
                    <br><br><br><br>
                </div>
            </div>
        </div>

        <div class="footer" style="background: #ece9e9;padding-top: 40px;padding-bottom: 40px;">
            <div class="container">
                <div class="col-12 text-center">
                    <small><strong>Classificados Fácil</strong> &copy; - Todos os direitos reservados - 2017</small>
                </div>
            </div>
        </div>
        <script type="application/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script type="application/javascript" src="{{ asset('bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
        <script type="application/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
