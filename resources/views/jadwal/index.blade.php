@extends('master')

@section('title','Ruang Kelas Kita')

@section('content')

@if(Session::has('flash_msg'))
    <div class="alert alert-success mt-5">{{Session::get('flash_msg')}}</div>
@endif
@if (Session::has('data2'))
@php
 $hari = Session::get('data2');
 $hari = $hari['hari'];

 $kelas = Session::get('data2');
 $kelas = $kelas['kelas'];

 $data = Session::get('data');
@endphp
    <div class="container">
        <div class="row my-3 ">
            <div class="col-md-6 col-lg-4 mt-3">
                <form action="{{url('cari')}}" method="POST">
                    @csrf
                <div class="container-pertama bg-light py-3 px-3">
                <label for="nama_hari">Hari : </label>   
                <select name="nama_hari" id="nama_hari">
                    @foreach ($hari as $key => $value)
                    @if($value == strtolower($hari_ini))
                    <option value="{{$value}}" selected>{{$value}}</option>
                    @endif
                    <option value ="{{$value}}" >{{$value}}</option> 
                    @endforeach
                </select>
                <label for="nama_kelas">Kelas : </label>   
                <select name="nama_kelas" id="nama_kelas">
                    @foreach ($kelas as $key => $value)
                        <option value="{{$key}}">{{$value}}</option> 
                    @endforeach
                </select>
            </div>
            <input type="submit" name="filter_1" value="cari" class="mt-3 form-control btn btn-primary">
            </form>
            </div>
    {{-- untuk filter ke 2 --}}
            <div class="col-md-6 col-lg-4 mt-3">
                <div class="container-2 bg-light px-3 py-2">
                <form action="{{url('cari')}}" method="post">
                        @csrf
                    <label for="kelas_kosong">
                    <input type="checkbox" name="kelas_kosong" id="kelas_kosong">
                    Kelas Kosong</label>   
                    <label for="lab_kosong">
                    <input type="checkbox" name="lab_kosong" id="lab_kosong">
                    LAB kosong</label>   
                    <label for="guru_kosong">
                    <input type="checkbox" name="guru_kosong" id="guru_kosong">
                    Guru Kosong</label>   
                </div>
                <input type="submit" name="filter_2" id="submit" value="cari" class="mt-3 form-control btn btn-primary">
                </form>
            </div>
    {{-- untuk filter 3 --}}
            <div class="col-md-6 col-lg-4 mt-3">
                <form action="cari" method="post">
                        @csrf
                    <label for="filter_3">
                        Cari Langsung :
                    </label>
                    <input type="text" name="filter_3" id="filter_3" class="form-control">
                <input type="submit" id="submit" name="filter_3" value="cari" class="mt-3 form-control btn btn-primary">
                </form>
            </div>

        </div>
    </div>
    <table class="table mt-5">
        
        <thead>
            <tr>
                <th>nama Kelas</th>
                <th>hari</th>
                <th>rombel</th>
                <th>guru</th>
                <th>status</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    
                    <td>{{$data['nama_ruang']}}</td>
                    <td>{{$data['daftar_hari']}}</td>
                    <td>{{$data['nama_rombel']}}</td>
                    <td>{{$data['nama_guru']}}</td>
                    <td>{{$data['status']}}</td>
                    <td scope="row">
                            <a class="btn btn-sm btn-primary" href="{{url('jadwal/'. $data['id'])}}">detail</a>
                        <form action="{{url('jadwal/'.$data['id'])}}" method="post">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            <a class="btn btn-sm btn-warning"href="{{url('jadwal/'. $data['id']).'/edit'}}">edit</a>
                        </td>
                </tr>
                
        </tbody>
    </table>
    @elseif(Session::has('data4'))
    @php
        $hari = Session::get('data4');
        $hari = $hari['hari'];

        $kelas = Session::get('data4');
        $kelas = $kelas['kelas'];

        $data = Session::get('data3');
@endphp
    <div class="container">
            <div class="row my-3 ">
                <div class="col-md-6 col-lg-4 mt-3">
                    <form action="{{url('cari')}}" method="POST">
                        @csrf
                    <div class="container-pertama bg-light py-3 px-3">
                    <label for="nama_hari">Hari : </label>   
                    <select name="nama_hari" id="nama_hari">
                        @foreach ($hari as $key => $value)
                        @if($value == strtolower($hari_ini))
                        <option value="{{$value}}" selected>{{$value}}</option>
                        @endif
                        <option value="{{$value}}" >{{$value}}</option> 
                        @endforeach
                    </select>
                    <label for="nama_kelas">Kelas : </label>   
                    <select name="nama_kelas" id="nama_kelas">
                        @foreach ($kelas as $key => $value)
                            <option value="{{$key}}">{{$value}}</option> 
                        @endforeach
                    </select>
                </div>
                <input type="submit" name="filter_1" value="cari" class="mt-3 form-control btn btn-primary">
                </form>
                </div>
        {{-- untuk filter ke 2 --}}
                <div class="col-md-6 col-lg-4 mt-3">
                    <div class="container-2 bg-light px-3 py-2">
                <form action="{{url('cari')}}" method="post">
                            @csrf
                        <label for="kelas_kosong">
                        <input type="checkbox" name="kelas_kosong" id="kelas_kosong">
                        Kelas Kosong</label>   
                        <label for="lab_kosong">
                        <input type="checkbox" name="lab_kosong" id="lab_kosong">
                        LAB kosong</label>   
                        <label for="guru_kosong">
                        <input type="checkbox" name="guru_kosong" id="guru_kosong">
                        Guru Kosong</label>   
                    </div>
                    <input type="submit" name="filter_2" id="submit" value="cari" class="mt-3 form-control btn btn-primary">
                    </form>
                </div>
        {{-- untuk filter 3 --}}
                <div class="col-md-6 col-lg-4 mt-3">
                    <form action="{{url('cari')}}" method="post">
                            @csrf
                        <label for="filter_3">
                            Cari Langsung :
                        </label>
                        <input type="text" name="filter_3" id="filter_3" class="form-control">
                    <input type="submit" id="submit" name="filter_3" value="cari" class="mt-3 form-control btn btn-primary">
                    </form>
                </div>
        
            </div>
        </div>
            <table class="table mt-5">
                
                <thead>
                    <tr>
                        <th>nama Kelas</th>
                        <th>hari</th>
                        <th>rombel</th>
                        <th>guru</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $value)
                    
                        <tr>
                            <td>{{$value['nama_ruang']}}</td>
                            <td>{{$value['daftar_hari']}}</td>
                            <td>{{$value['nama_rombel']}}</td>
                            <td>{{$value['nama_guru']}}</td>
                            <td>{{$value['status']}}</td>
                            <td scope="row">
                                    <a class="btn btn-sm btn-primary" href="{{url('jadwal/'. $value['id'])}}">detail</a>
                                <form action="{{url('jadwal/'.$value['id'])}}" method="post">
                                    @csrf
                                    @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <a class="btn btn-sm btn-warning"href="{{url('jadwal/'. $value['id']).'/edit'}}">edit</a>
                                </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
    
            @elseif(Session::has('data7') || Session::has('data6') ||Session::has('data5'))
                @php
                $data5 = (Session::has('data5')) ? Session::get('data5') :'';
                $data6 = (Session::has('data6')) ? Session::get('data6') :'';
                $data7 = (Session::has('data7')) ? Session::get('data7') :'';
                if(Session::has('data5')){
                    $datas= $data5;
                }
                elseif (Session::has('data6')) {
                    $datas = $data6;
                }

                elseif (Session::has('data7')) {
                    $datas = $data7;
                }
                else{
                    $datas = 'dancok data ne gak onk plek';
                }
                @endphp
            <div class="container">
                </div>
                    <table class="table mt-5">
                        
                        <thead>
                            <tr>
                                <th>nama data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key => $value)
                            
                                <tr>
                                    <td>{{$value}}</td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>

    {{--    preg match --}}
    
    @elseif(Session::has('cari_langsung'))
    <table class="table">
            <tr>
                <th>Nama Ruang</th>
                <th>status</th>
                <th>action</th>
            </tr>   
    @foreach ($data as $data)
            @if(preg_match('/'.Session::get('cari_langsung').'/',$data['nama_ruang']) && $data['status'] == 'active' && $data['daftar_hari'] == Session::get('hari_ini'))
                        <tr>
                                <td scope="row">{{$data['nama_ruang']}} </td>
                                <td scope="row">{{$data['status']}} </td>
                                <td scope="row">
                                    <a class="btn btn-sm btn-primary" href="{{url('ruang/detail/'. $data['id'])}}">detail</a>
                                    {{-- <a class="btn btn-sm btn-danger"href="{{url('ruang/delete/'. $data['id'])}}">Delete</a> --}}
                                <form action="{{url('ruang/delete/'.$data['id'])}}" method="post">
                                    @csrf
                                    @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <a class="btn btn-sm btn-warning"href="{{url('ruang/edit/'. $data['id'])}}">edit</a>
                                </td>
                            </tr>

                        @elseif(preg_match('/'.Session::get('cari_langsung').'/',$data['nama_rombel'])  && $data['status'] == 'active' && $data['daftar_hari'] == Session::get('hari_ini'))
                        <tr>
                                <td scope="row">{{$data['nama_ruang']}} </td>
                                <td scope="row">{{$data['status']}} </td>
                                <td scope="row">
                                    <a class="btn btn-sm btn-primary" href="{{url('ruang/detail/'. $data['id'])}}">detail</a>
                                    {{-- <a class="btn btn-sm btn-danger"href="{{url('ruang/delete/'. $data['id'])}}">Delete</a> --}}
                                <form action="{{url('ruang/delete/'.$data['id'])}}" method="post">
                                    @csrf
                                    @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <a class="btn btn-sm btn-warning"href="{{url('ruang/edit/'. $data['id'])}}">edit</a>
                                </td>
                            </tr>
                        @elseif(preg_match('/'.Session::get('cari_langsung').'/',$data['nama_guru'])  && $data['status'] == 'active' && $data['daftar_hari'] == Session::get('hari_ini'))
                        <tr>
                                <td scope="row">{{$data['nama_ruang']}} </td>
                                <td scope="row">{{$data['status']}} </td>
                                <td scope="row">
                                    <a class="btn btn-sm btn-primary" href="{{url('ruang/detail/'. $data['id'])}}">detail</a>
                                    {{-- <a class="btn btn-sm btn-danger"href="{{url('ruang/delete/'. $data['id'])}}">Delete</a> --}}
                                <form action="{{url('ruang/delete/'.$data['id'])}}" method="post">
                                    @csrf
                                    @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <a class="btn btn-sm btn-warning"href="{{url('ruang/edit/'. $data['id'])}}">edit</a>
                                </td>
                            </tr>
                            @else
                            {{-- <p>data {{Session::get('cari')}} tidak active</p> --}}
                            @endif
                            @endforeach
                </table>
    @elseif (isset($data)) 

{{-- kolom pencarian --}}
{{-- filter pertama --}}
<div class="container">
    <div class="row my-3 ">
        <div class="col-md-6 col-lg-4 mt-3">
            <form action="{{url('cari')}}" method="POST">
                @csrf
            <div class="container-pertama bg-light py-3 px-3">
            <label for="nama_hari">Hari : </label>   
            <select name="nama_hari" id="nama_hari">
                @foreach ($hari as $key => $value)
                @if($value == strtolower($hari_ini))
                <option value="{{$value}}" selected>{{$value}}</option>
                @else
                <option value="{{$value}}" >{{$value}}</option> 
                @endif
                @endforeach
            </select>
            <label for="nama_kelas">Kelas : </label>   
            <select name="nama_kelas" id="nama_kelas">
                @foreach ($kelas as $key => $value)
                    <option value="{{$key}}">{{$value}}</option> 
                @endforeach
            </select>
        </div>
        <input type="submit" name="filter_1" value="cari" class="mt-3 form-control btn btn-primary">
        </form>
        </div>
{{-- untuk filter ke 2 --}}
        <div class="col-md-6 col-lg-4 mt-3">
            <div class="container-2 bg-light px-3 py-2">
            <form action="{{url('cari')}}" method="post">
                    @csrf
                <label for="kelas_kosong">
                <input type="checkbox" name="kelas_kosong" id="kelas_kosong">
                Kelas Kosong</label>   
                <label for="lab_kosong">
                <input type="checkbox" name="lab_kosong" id="lab_kosong">
                LAB kosong</label>   
                <label for="guru_kosong">
                <input type="checkbox" name="guru_kosong" id="guru_kosong">
                Guru Kosong</label>   
            </div>
            <input type="submit" name="filter_2" id="submit" value="cari" class="mt-3 form-control btn btn-primary">
            </form>
        </div>
{{-- untuk filter 3 --}}
        <div class="col-md-6 col-lg-4 mt-3">
            <form action="{{url('cari')}}" method="post">
                    @csrf
                <label for="filter_3">
                    Cari Langsung :
                </label>
                <input type="text" name="filter_3" id="filter_3" class="form-control">
            <input type="submit" id="submit" value="cari" class="mt-3 form-control btn btn-primary">
            </form>
        </div>

    </div>
</div>

    <table class="table mt-5">
            <thead>
                <tr>
                    <th>nama kelas</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($kelas as $key => $value)
            <tr>
                <td scope="row"><a href="{{$key}}" class="list_kelas">{{$value}}</a></td>
            </tr>
            @endforeach
        </table>
    </tbody>
    <div > <a href="{{url('jadwal/create')}}" class="btn btn-md btn-primary"> Tambah Jadwal</a></div> 
    
@else
<p><a href="{{url('jadwal/create')}}">tambah jadwal</a></p>

    @endif

    



@endsection