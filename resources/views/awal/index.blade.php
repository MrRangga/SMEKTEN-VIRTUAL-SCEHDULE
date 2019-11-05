@extends('layouts.app')

@section('title','selamat datang di app ruang manajemen')

@section('content')

<div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block" src="{{asset('img/Artboard 1.png')}}" alt="First slide">
      <div class="carousel-caption">
          <img src="{{asset('img/Untitled-4.png')}}" class="d-inline" width="200">
          <div class="item">
            <h3>SMKN 10 SURABAYA </h3>
            <p>CERDAS BERKARAKTER <b> INOVATIF</b> & KREATIF</p>

            <a href="http://www.smkn10surabaya.sch.id/" type="button" class="btn btn-outline-light px-5 mb-3 tmbl">Lihat</a>
            <p>
                <i class="fab fa-facebook-f"></i>
                <em>smkn10surabaya</em> 

                <i class="fab fa-instagram"></i>

                <em>@smkn10surabaya</em>

                <i class="fas fa-globe"></i>
                <em>http://www.smkn10surabaya.sch.id/</em> 
            </p>
          </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-100" src="{{asset('img/2.png')}}" alt="Second slide">

      <div class="carousel-caption">
          <i class="far fa-calendar-alt" id="item2"></i>
        <h3>SMEKTEN VIRTUAL JADWAL</h3>
        <p>Adalah Aplikasi Monitoring Jadwal pembelajran & Ruang Sederhana </p>
        <a href="url()" class="btn btn-outline-light px-5 tmbl2" data-toggle="modal"  data-target="#exampleModalLong">Baca</a>  
        @auth
            
        <a href="{{url('sekolah')}}" class="btn btn-outline-light ml-3 px-4 tmbl2">Lanjutkan</a>  
        @endauth
        <a href="{{url('jadwal')}}" class="btn btn-outline-light ml-3 px-5 tmbl2">Ruang</a>  
      </div>
    </div>

    
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
</div>
{{-- <div class="jumbotron ">
    <h1 class="display-4">Sekolahku , its so simple and usefull</h1>
    <p class="lead">Aplikasi monitoring jadwal Sekolah sederhana dikembangkan oleh Mohammad Firmansyah</p>
    <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModalLong">
      Documentation
    </button>
  <a href="{{url('sekolah')}}" class="btn btn-lg btn-success float-right">Lanjut</a>
  </div> --}}
  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sekolahku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>Sekolahku</b>,adalah aplikasi yang dibuat untuk memonitoring jadwal ruang kelas,guru,rommbel
        <br>
        -fitur-fitur:<br><br>
          1)<i>fitur untuk menambah data sekolah</i>,ini meliputi data jam masuk jam pulang dan jam istirahat yang untuk versi sederhana ini saya masih meberikan 2 inputan standar untuk jam istirahat yaitu 09:30:00/12:15:00 ini standar untuk penambahan kondisi yang lain akan dikembanngkan untuk waktu kedepan dan ada juga perjam jumlah jam,daftar rombel,daftar guru(untuk menambahkanya dengana format sbb:<b>nama guru , nama materi / nama guru ,nama materi </b> ini akan menambahkan dua guru yang memiliki materi yang berbeda),daftar ruang(setiapruang penulisan namnya dipisahkan dengan tanda koma , )  daftar rombel (setiap nama rombel penulisan namanya dipisahkan dengan tanda koma , )dll <br> <br> 
          2)<i>fitur tambah jadwal</i>,adalah untuk menambah data jadwal kami memberikan kenyamanan dengan memberikan inputan berupa dropdown dengn data yang telah di  input dari data sekolah tadi. <br><br>  
          3)data anda tidak akan bentrok karena kami mengechek data jadwal tadi!!<br><br>
          4)ada fitur Api 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection