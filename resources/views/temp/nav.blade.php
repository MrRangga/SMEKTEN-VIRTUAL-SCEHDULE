<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">      
    <a class="navbar-brand" href="{{url('/')}}">Sekolahku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{url('sekolah')}}">Sekolah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('jadwal')}}">Ruang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('api/v1/getJadwal')}}">Api</a>
            </li>
            
          </ul>
        </div>
    </div>
      </nav>