<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelajaran;
use App\Ruang;
use App\Guru;
use App\Rombel;
use App\Sekolah;
use Session;

class sekolahController extends Controller
{

    public function index()
    {
        $sekolah = Sekolah::all('nama_sekolah')->first();
        if(!isset($sekolah))
        {
            Session::flash('flash_msg','Anda Belum Membuat Data Sekolah Buat dulu dengan mengisi seluruh Data dibawah');

            return redirect('sekolah/create');
        }
        $data_sekolah = Sekolah::all();
        $data_sekolah = $data_sekolah[0];   
    return view('sekolah/index',compact('data_sekolah'));
    }

    public function create()
    {
        return view('sekolah/create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama_ruang' => 'required|string',
            'nama_guru' => 'required|string',
        ]);
        
        $guru = explode('/',$req->nama_guru);
        $ruang = explode(',',$req->nama_ruang);
        $hari = $req->daftar_hari;
        $jam = $req->daftar_jam;
        $perjam = $req->perjam;
        $sekolah = $req->nama_sekolah;
        $rombel = explode(',',$req->daftar_rombel);
        $jam_masuk = $req->jam_masuk;
        $jam_pulang = $req->jam_pulang;
        $jam_istirahat = $req->jam_istirahat;
        $jam_khusus = $req->jam_khusus;
        $this->insert_guru($guru);
        $this->insert_ruang($ruang);
        $this->insert_dapodik($hari,$jam,$perjam,$sekolah,$jam_masuk,$jam_pulang,$jam_istirahat,$jam_khusus);
        $this->insert_rombel($rombel);

        return redirect('sekolah');
    }

    public function edit($id)
    {
        $data_sekolah = Sekolah::find($id);
        return view('sekolah/edit',compact('data_sekolah'));
    }
    public function show()
    {

    }
    public function update(Request $req)
    {
        $sekolah = Sekolah::find($req->id);
        $sekolah->daftar_hari=$req->daftar_hari; 
        $sekolah->jumlah_jam=$req->daftar_jam; 
        $sekolah->jam_masuk=$req->jam_masuk; 
        $sekolah->jam_pulang=$req->jam_pulang; 
        $sekolah->jam_istirahat=$req->jam_istirahat; 
        $sekolah->jam_istirahat=$req->perjam; 
        $guru = explode('/',$req->nama_guru);
        $ruang = explode(',',$req->nama_ruang);
        $rombel = explode(',',$req->daftar_rombel);
        $sekolah->update();
        $this->update_guru($guru);
        $this->update_rombel($rombel);
        $this->update_ruang($ruang);
        return redirect('sekolah/');
    }
    public function destroy(Request $req,$id)
    {
        Sekolah::find($id)->delete();
        return redirect('sekolah/create ');
    }

    private function insert_guru($guru)
    {
        
        for($a=0; $a < count($guru); $a++)
        {
            DB::table('guru')->insert([
                'kode_guru' => $guru[$a],
            ]);
        }


    }

    private function insert_ruang($ruang)
    {
        for($a=0;$a<count($ruang);$a++)
        {
            DB::table('ruang')->insert([
                'nama_ruang' => $ruang[$a],
            ]);
        }

        
    }

    private function insert_rombel($rombel)
    {
        for($a=0;$a<count($rombel);$a++)
        {
            DB::table('rombel')->insert([
                'nama_rombel' => $rombel[$a],
            ]);
        }

    }

    private function insert_dapodik($hari,$jam,$perjam,$sekolah,$jam_masuk,$jam_pulang,$jam_istirahat,$jam_khusus)
    {
        DB::table('data_sekolah')->insert([
            'nama_sekolah' => $sekolah,
            'daftar_hari' => $hari, 
            'jumlah_jam' => $jam, 
            'perjam' => $perjam,
            'jam_masuk' => $jam_masuk,
            'jam_pulang' => $jam_pulang,
            'jam_istirahat' => $jam_istirahat,
            'jam_khusus' => $jam_khusus,
        ]);
    }

    private function update_ruang($ruang)
    {
        for($a=0;$a<count($ruang);$a++)
        {
            DB::table('ruang')->update([
                'nama_ruang' => $ruang[$a],
            ]);
        }

        
    }

    private function update_rombel($rombel)
    {
        for($a=0;$a<count($rombel);$a++)
        {
            DB::table('rombel')->update([
                'nama_rombel' => $rombel[$a],
            ]);
        }

    }

    private function update_guru($guru)
    {
        
        for($a=0; $a < count($guru); $a++)
        {
            DB::table('guru')->update([
                'kode_guru' => $guru[$a],
            ]);
        }


}
}