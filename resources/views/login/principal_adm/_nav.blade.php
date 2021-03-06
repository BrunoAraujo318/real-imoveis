<nav>
    <div id="letra" class="nav-wrapper">
        <div class="container">
          <a href="{{ route('admin.principal') }}" class="brand-logo"><img src="{{ asset('img/logo_80_final.png')}}"></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a  target="_blanck" href="{{ route('site.home') }}"><i class="material-icons">home</i></a></li>
            @if(Auth::guest())
              <li><a href="{{ route('login') }}">Login</a></li>
            @else
              <li><a class="dropdown-button" href="#" data-activates="dropdown1">{{ Auth::user()->nome }}<i class="material-icons right">arrow_drop_down</i></a></li>
              <li>
                <ul id="dropdown1" class="dropdown-content">
                  <li><a href="{{ route('admin.principal') }}">{{ Auth::user()->nome }}</a></li>
                  <li><a href="{{ route('admin.perfil') }}">Perfil</a></li>
                </ul>
              </li>
              <li><a href="{{ route('admin.login.sair') }}">Sair</a></li>
            @endif
          </ul>
          <ul class="side-nav" id="mobile-demo">
            <li><a target="_blanck" href="{{ route('site.home') }}"><i class="material-icons">home</i></a></li>
            @if(Auth::guest())
              <li><a href="{{ route('login') }}">Login</a></li>
            @else
              <li><a class="dropdown-button" href="{{ route('admin.principal') }}" data-activates="dropdown2">{{ Auth::user()->nome }}<i class="material-icons right">arrow_drop_down</i></a></li>
              <ul id="dropdown2" class="dropdown-content">
                <li><a href="{{ route('admin.principal') }}">{{ Auth::user()->nome }}</a></li>
                <li><a href="{{ route('admin.perfil') }}">Perfil</a></li>
              </ul>
              <li><a href="{{ route('admin.login.sair') }}">Sair</a></li>
            @endif
          </ul>
        </div>
    </div>
</nav>