<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">    
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                </li>
            @endif
            
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Dar de alta') }}</a>
                </li>
            @endif
        @else
                <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/register') }}"><i class="fas fa-users text-info"></i> Dar de alta</a>
                    <a class="dropdown-item" href="{{ url('/home') }}"><i class="fas fa-school text-info"></i> Escuelas</a>
                    <a class="dropdown-item" href="{{ url('/schools') }}"><i class="fas fa-edit text-info"></i> Administrar escuelas</a> 
                    <a class="dropdown-item" href="{{ url('/promos') }}"><i class="fas fa-graduation-cap text-info"></i> Promos</a> 
                    <a class="dropdown-item" href="{{ url('/promos') }}"><i class="fas fa-edit text-info"></i> Administrar promos</a> 
                    <a class="dropdown-item dropdown-last-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>