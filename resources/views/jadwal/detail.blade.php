@extends('master')

@section('title','detail ruang')

@section('content')
    <table class="table">
        
        <tbody>
            <tr>
                <td scope="row">Nama_ruang</td>
                <td>{{$nama_ruang}}</td>
            </tr>
            <tr>
                <td scope="row">nama_rombel</td>
                <td>{{$nama_rombel}}</td>
            </tr>

            <tr>
                    <td scope="row">nama_hari</td>
                    <td>{{$nama_hari}}</td>
            </tr>
            <tr>
                    <td scope="row">nama_guru</td>
                    <td>{{$nama_guru}}</td>
            </tr>
            <tr>
                    <td scope="row">jam ke</td>
                    <td>jam : {{$jamke[0]}} -{{$jamke[1]}} </td>
                </tr>
        </tbody>
    </table>
@endsection