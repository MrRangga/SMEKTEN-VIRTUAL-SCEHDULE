<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">      
        <img src="http://www.smkn10surabaya.sch.id/asset/logo/smkn-10-sby_2.png" width="30" alt="smkn 10 logo" style="margin-right:10px;">
        <a class="navbar-brand " href="{{ url('/') }}">
            SMKN 10 Surabaya 
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="{{ url('jadwal') }}">Ruang</a>
                        </li>
                        @else
                      <li class="nav-item">
                              <a class="nav-link" href="{{ url('jadwal') }}">Sekolah</a>
                          </li>
                        
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ url('jadwal') }}">Ruang</a>
                                </li>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
      </nav>