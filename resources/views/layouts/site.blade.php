<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}</title>
    <meta name="description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}">
    <meta name="twitter:card" value="sumary">

    <meta property="og:title" content="{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : config('app.url') }}" />
    <meta property="og:image" content="{{ isset($seo['imagem']) ? $seo['imagem'] : config('seo.imagem') }}" />
    <meta property="og:description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}" />

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}">

    <script type="text/javascript">
    var getPath = function (url) {
      url = url || '';

      return "{{ asset('') }}"+url;
    }
    </script>

</head>
<body id="app-layout">
  <header>
    @include('layouts._site._nav')
  </header>
  <main>
    @if(Session::has('mensagem'))
      <div class="container">
        <div class="row">
          <div class="card {{ Session::get('mensagem')['class'] }}">
            <div align="center" class="card-content">
              {{Session::get('mensagem')['msg']}}
            </div>
          </div>
        </div>
      </div>
    @endif
    @yield('content')
  </main>

  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Real Imóveis</h5>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="{{ route('site.home') }}">Home</a></li>
            <li><a class="grey-text text-lighten-3" href="{{ route('site.sobre') }}">Sobre</a></li>
            <li><a class="grey-text text-lighten-3" href="{{ route('site.contato') }}">Contato</a></li>
            <li><a class="grey-text text-lighten-3" href="{{ route('login') }}">Login</a></li>

          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2017 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>


  <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
  <script src="{{asset('lib/jquery-mask/jquery.mask.min.js')}}"></script>
  <script src="{{asset('lib/jquery-loading-overlay/src/loadingoverlay.min.js')}}"></script>
  <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
  <script src="{{asset('js/init.js')}}"></script>
  <script src="{{asset('js/real-imovel.js')}}"></script>
  <script src="{{asset('js/home.js')}}"></script>
  <script>
    // executando quando a tela terminar de carregar
    $(function(){
      realImovel.iniciar();
    });
  </script>

  @yield('js')
</body>
</html>
