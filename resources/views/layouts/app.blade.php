<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <title>Real Imóveis</title>

    
</head>
<body id="app-layout">

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
  
  <footer class="page-footer #9e9e9e grey">
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
      <div class="footer-copyright #000000 black">
        <div class="container">
          © 2017 Copyright Text
          <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
  </footer>

  <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
  <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
  <script src="{{asset('js/init.js')}}"></script>

</body>
</html>