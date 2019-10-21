@extends('master')

@section('tambah data kelas')
    
@section('content')

    <form action='{{url('jadwal/'. $id)}}' method="post" class="mt-5">
        @csrf
        @method('PUT')
        <input type = "hidden" value={{$id}} >
        <div class="form-group">
            <label for="nama_ruang">Pilih Ruang</label>
            <select class="form-control" name="nama_ruang" id="nama_ruang">
                @foreach ($nama_ruang as $key => $value)
                    @if ($key == $data_jadwal->id_ruang)
                        <option value= {{$key}} selected >Ruang : {{$value}}</option>
                    @else
                        <option value= {{$key}} >Ruang : {{$value}}</option>
                    @endif
            @endforeach
            </select>
        </div>
        @if($errors->has('nama_ruang'))
        <br>
        <div class="alert alert-danger">{{ $errors->first('nama_ruang') }}</div>
        @endif
        <div class="form-group">
            <label for="guru">Pilih Pengajar</label>
            <select class="form-control" name="nama_guru" id="guru">
                @foreach ($guru as $key => $value) 
                    @if ($key == $data_jadwal->id_guru)
                        <option value= {{$key}} selected>guru : {{$value}}</option>
                    @else
                    <option value= {{$key}}>guru : {{$value}}</option>
                    @endif
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
                    @if ($value == $data_jadwal->nama_hari)
                        <option value= {{$key}} selected >{{$value}}</option>
                    @endif 
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
          <input type="number" min="1" max="11" name="jam_awal" id="jam_awal" class="form-control" placeholder="Jam Dimulai ke" value = {{$data_jadwal->jam_awal}}>
        </div>
        @if($errors->has('jam_awal'))
        <br>
        <div class="alert alert-danger">{{ $errors->first('jam_awal') }}</div>
        @endif
        <div class="form-group">
            <label for="jam_ahkir">Jam terahkir : </label>
            <input type="number" min="1" max="11" name="jam_ahkir" id="jam_ahkir" class="form-control" placeholder="Jam berahkir" value = {{$data_jadwal->jam_ahkir}} >
        </div>
        @if($errors->has('jam_terahkir'))
        <br>
        <div class="alert alert-danger">{{ $errors->first('jam_terahkir') }}</div>
        @endif
        <div class="form-group">
            <label for="nama_rombel">Pilih Rombel</label>
            <select class="form-control" name="nama_rombel" id="nama_rombel">
                @foreach ($nama_rombel as $key => $value) 
                @if ($value == $data_jadwal->nama_rombel)
                    <option value= {{$key}} selected >{{$value}}</option>
                @endif 
                    <option value= {{$key}}>{{$value}}</option>
            @endforeach
            </select>
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