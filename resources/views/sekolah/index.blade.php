@extends('master')

@section('title','data sekoalh')

@section('content')
<div class="container">
        <div class="row  justify-content-center ">
            <div class="col-md-3 text-justify ">
                <div class="container-logo d-flex align-items-center">
                <div class="img-logo mx-auto ">
                    <img src="http://foto2.data.kemdikbud.go.id/getImage/20532204/5.jpg" alt=""></div>
                </div>
            </div>
            <div class="col-md-8 ml-auto  d-flex align-items-center">
                <div class="text ">
                <table class="table">
                        <tr>
                                <th scope="row">Nama Sekolah :</th>
                                <td>{{$data_sekolah->nama_sekolah}}</td>
                              </tr>
                        <tr>
                                <th scope="row">jam pulang :</th>
                                <td>{{$data_sekolah->jam_pulang}}</td>
                        </tr>
                        <tr>
                                <th scope="row">jam masuk :</th>
                                <td>{{$data_sekolah->jam_masuk}}</td>
                        </tr>
                        <tr>
                                <th scope="row">jam jam istirahat :</th>
                                <td>{{$data_sekolah->jam_istirahat}}</td>
                        </tr>
                        <tr>
                            
                            <td>
                            <form action="{{url('sekolah/'.$data_sekolah->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-md btn-danger d-inline p-2">hapus</button>
                            </form>
                                <a href="{{url('sekolah/'.$data_sekolah->id.'/edit')}}" class="btn btn-md btn-warning d-inline" class="d-inline p-2">edit data</a>
                            </td>
                        </tr>
                                  
                              
                </table>
            </div>
            
            </div>   
        </div>
    
    </div>
@endsection