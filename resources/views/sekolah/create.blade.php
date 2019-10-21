@extends('master')

@section('pengaturan awal')

@section('content')
  @if(Session::has('flash_msg'))
    <div class="mt-5 alert alert-danger {{Session::has('penting') ? 'alert-important':''}}">
        {{Session::get('flash_msg')}} 
      </div>
  @endif
<form action='{{url('sekolah')}}' method="post" class="mt-5">
    @csrf
    <div class="form-group">
      <label for="nama_sekolah">nama_sekolah</label>
      <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" placeholder="nama sekolah">
  </div>
  @if($errors->has('nama_sekolah'))
  <br>
  <div class="alert alert-danger">{{ $errors->first('nama_sekolah') }}</div>
  @endif  
    <div class="form-group">
        <label for="nama_ruang">daftar ruang</label>
        <input type="text" name="nama_ruang" id="nama_ruang" class="form-control" placeholder="daftar Ruang">
    </div>
    @if($errors->has('nama_ruang'))
    <br>
    <div class="alert alert-danger">{{ $errors->first('nama_ruang') }}</div>
    @endif
   
    <div class="form-group">
      <label for="nama_guru">Daftar Guru</label>
      <input type="text" name="nama_guru" id="nama_guru" class="form-control" placeholder="Daftar Guru" >
    </div>
    @if($errors->has('nama_guru'))
    <br>
    <div class="alert alert-danger">{{ $errors->first('nama_guru') }}</div>
    @endif      

    <div class="form-group">
      <label for="nama_hari">daftar_Hari</label>
      <input type="text" name="daftar_hari" id="daftar_hari" class="form-control" placeholder="daftar hari" aria-describedby="helpId">
    </div>
    @if($errors->has('daftar_hari'))
    <br>
    <div class="alert alert-danger">{{ $errors->first('daftar_hari') }}</div>
    @endif
    <div class="form-group">
      <label for="daftar_jam">Jumblah jam</label>
      <input type="number" min="1" max="11" name="daftar_jam" id="daftar_jam" class="form-control" placeholder="Jam Dimulai ke" >
    </div>
    @if($errors->has('daftar_jam'))
    <br>
    <div class="alert alert-danger">{{ $errors->first('daftar_jam') }}</div>
    @endif
    <div class="form-group">
        <label for="jam_masuk">jam masuk</label>
        <input type="text" name="jam_masuk" id="jam_masuk" class="form-control" placeholder="Jam Dimulai ke" >
      </div>
      @if($errors->has('jam_masuk'))
      <br>
      <div class="alert alert-danger">{{ $errors->first('jam_masuk') }}</div>
      @endif
      <div class="form-group">
          <label for="jam_pulang">jam pulang</label>
          <input type="text" name="jam_pulang" id="jam_pulang" class="form-control" placeholder="Jam Dimulai ke" >
        </div>
        @if($errors->has('jam_pulang'))
        <br>
        <div class="alert alert-danger">{{ $errors->first('jam_pulang') }}</div>
        @endif
        <div class="form-group">
            <label for="jam_istirahat">jam istirahat</label>
            <input type="text" name="jam_istirahat" id="jam_istirahat" class="form-control" placeholder="Jam Dimulai ke" >
          </div>
          @if($errors->has('jam_istirahat'))
          <br>
          <div class="alert alert-danger">{{ $errors->first('jam_istirahat') }}</div>
          @endif
    <div class="form-group">
      <label for="perjam">Per jam</label>
      <input type="number" name="perjam" id="perjam" class="form-control" placeholder="Jam Dimulai ke" >
    </div>
    @if($errors->has('perjam'))
    <br>
    <div class="alert alert-danger">{{ $errors->first('perjam') }}</div>
    @endif
    <div class="form-group">
        <label for="dafatr_rombel">Daftar rombel</label>
        <input type="text" name="daftar_rombel" id="daftar_rombel" class="form-control" placeholder="daftar rombel">
    </div>
    @if($errors->has('daftar_rombel'))
    <br>
    <div class="alert alert-danger">{{ $errors->first('daftar_rombel') }}</div>
    @endif
    <div class="form-group">
      <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</form>
@endsection