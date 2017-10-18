<nav>
  <div id="letra" class="nav-wrapper">
      <div class="container">
        <a href="{{ route('site.home') }}" class="brand-logo"><img src="{{ asset('img/logo_80_final.png')}}"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="{{ route('site.home') }}">Home</a></li>
          <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
          <li><a href="{{ route('site.contato') }}">Contato</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a id="cadastrar" href="{{ route('principal.cadastro') }}">Cadastrar-se</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="{{ route('site.home') }}">Home</a></li>
          <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
          <li><a href="{{ route('site.contato') }}">Contato</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a id="cadastrar" href="{{ route('principal.cadastro') }}">Cadastrar-se</a></li>
        </ul>
      </div>
  </div>
</nav>