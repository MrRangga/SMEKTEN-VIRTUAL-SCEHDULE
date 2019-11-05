@extends('master')

@section('tambah data kelas')
    
@section('content')
    @if(Session::has('flash_msg'))
        <div class="alert alert-danger mt-2">
            {{Session::get('flash_msg')}}
        </div>
    @endif
    <form action='{{url('jadwal')}}' method="post" class="mt-5">
        @csrf
        <div class="form-group">
            <label for="nama_ruang">Pilih Ruang</label>
            <select class="form-control" name="nama_ruang" id="nama_ruang">
                @foreach ($nama_ruang as $key => $value) 
                    <option value= {{$key}} >Ruang : {{$value}}</option>
            @endforeach
            </select>
        </div>
        @if($errors->has('nama_ruang'))
        <br>
        <div class="alert alert-danger">{{ $errors->first('nama_ruang') }}</div>
        @endif
        <div class="form-group">
            <label for="guru">Pilih Pengajar</label>
            <select class="form-control" name="guru" id="guru">
                @foreach ($guru as $key => $value) 
                    <option value= {{$key}}>guru : {{$value}}</option>
            @endforeach
            </select>
        </div>
        @if($errors->has('guru'))
        <br>
        <div class="alert alert-danger">{{ $errors->first('guru') }}</div>
        @endif      

        <div class="form-group">
            <label for="nama_hari">Pilih hari</label>
            <select class="form-control" name="nama_hari" id="nama_hari">
                @foreach ($hari[1] as $key => $value) 
                    <option value= {{$value}}>{{$value}}</option>
            @endforeach
            </select>
        </div>
        @if($errors->has('nama_hari'))
        <br>
        <div class="alert alert-danger">{{ $errors->first('nama_hari') }}</div>
        @endif
        <div class="form-group">
            
          <label for="jam_awal">Jam awal : </label>
          <input type="number" min="1" max="11" name="jam_awal" id="jam_awal" class="form-control" placeholder="Jam Dimulai ke" >
        </div>
        @if($errors->has('jam_awal'))
        <br>
        <div class="alert alert-danger">{{ $errors->first('jam_awal') }}</div>
        @endif
        <div class="form-group">
            <label for="jam_terahkir">Jam terahkir : </label>
            <input type="number" min="1" max="11" name="jam_terahkir" id="jam_terahkir" class="form-control" placeholder="Jam berahkir" >
        </div>
        @if($errors->has('jam_terahkir'))
        <br>
        <div class="alert alert-danger">{{ $errors->first('jam_terahkir') }}</div>
        @endif
        <div class="form-group">
            <label for="nama_rombel">Pilih Rombel</label>
            <select class="form-control" name="nama_rombel" id="nama_rombel">
                @foreach ($nama_rombel as $key => $value) 
                    <option value= {{$key}}>{{$value}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <b>Kondisi Khusus</b> <br>
            <label for="">Senin Upacara</label>
            <input type="checkbox" name="jadwal_khusus" id="senin_upacara" value="senin_upacara"> <br>
            <label for="jumat_12">Jumat kelas 12</label>
            <input type="checkbox" name="jadwal_khusus" id="jumat_12" value="jumat_12"><br>
            <label for="jumat_11">jumat kelas 11</label>
            <input type="checkbox" name="jadwal_khusus" id="jumat_11" value="jumat_11"><br>
            <label for="jumat_10">jumat kelas 10</label> 
            <input type="checkbox" name="jadwal_khusus" id="jumat_10" value="jumat_10">
        </div>
        @if($errors->has('rombel'))
        <br>
        <div class="alert alert-danger">{{ $errors->first('rombel') }}</div>
        @endif
        <div class="form-group">
          <button type="submit" class="btn btn-primary form-control">Submit</button>
        </div>
        
    </form>
@endsection