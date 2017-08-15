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
                <div class="col header text-center" style="height: 170px;padding-top: 30px">
                    <h1 class="display-3">Classificados Fácil</h1>
                    <p class="display-6">Gerenciamento de classificados de maneira simples.</p>
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
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Imóveis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Veículos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Eletrônicos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Roupa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Móveis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Eletrodomésticos</a>
                                </li>

                                </ul>
                                <form class="form-inline my-3 my-lg-0">
                                    <input class="form-control mr-sm-2" type="text" placeholder="Digite sua pesquisa aqui" aria-label="Pesquisar">
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
                    @yield('content')
                </div>
            </div>
        </div>
        <script type="application/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script type="application/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
