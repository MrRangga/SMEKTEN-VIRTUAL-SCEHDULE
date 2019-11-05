<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Ruang;
use App\Jadwal;
use App\Guru;
use App\Sekolah;
use App\Rombel;
use App\api_jadwal;
use Session;


class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     * 
     * 
     * 
     * @return \Illuminate\Http\Response`
     */
    public function index()
    {
        // dd(count(Sekolah::all('nama_sekolah')) == 0);

        if(count(Sekolah::all()) == 0){
            return  redirect('sekolah/create');
        }
        //tentukan zona waktu
        date_default_timezone_set('Asia/Jakarta');
        // tentukan hari ini
        $hari_ini = $this->dayChecker();
        // ambil nama rombel
        $kelas= Rombel::pluck('nama_rombel','id');
        $kelas = $kelas;
        // ambil data hari dan uraikan
        $hari = Sekolah::all('daftar_hari');
        $hari = explode(',',$hari[0]['daftar_hari']);
        //uraikan data dari db ke view
        $ruang = Jadwal::all()->toArray();
        for($a=0;$a < count($ruang); $a++)
        {
            $jadwal= Jadwal::find($ruang[$a]['id']);
            $nama_ruang = $jadwal->id_ruang;
            $nama_ruang = Ruang::find($nama_ruang);
            $nama_ruang =$nama_ruang->nama_ruang;
            $daftar_hari = $jadwal->nama_hari;
            $nama_rombel = $jadwal->id_rombel;
            $nama_rombel = Rombel::find($nama_rombel);
            $nama_rombel = $nama_rombel->nama_rombel;
            $nama_guru = $jadwal->id_guru;
            $nama_guru = Guru::find($nama_guru);
            $nama_guru = $nama_guru->kode_guru;
            $jam_awal= $jadwal->jam_awal;
            $jam_ahkir= $jadwal::find($ruang[$a]['id'])->jam_ahkir;
            $jam =['awal' => $jam_awal,'ahkir' => $jam_ahkir];
            $jamke = $jam_awal;
            $jadwal_khusus = $jadwal->jadwal_khusus;
            
            $jam = $this->convertJam($jam,$jamke,$jadwal_khusus);
            // dd(date('H:i:s',$jam));
            $jam = $this->cekJam($jam);
            $id []= Jadwal::find($ruang[$a]['id'])->id;
            $data[] = ['nama_ruang' => $nama_ruang,'status' => $jam,'id'=>$id[$a],'daftar_hari' => $daftar_hari,'nama_rombel' => $nama_rombel,'nama_guru' => $nama_guru];
            
        }


        return view('jadwal/index',compact('data','id','kelas','hari','hari_ini'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru=Guru::pluck('kode_guru','id');
        $nama_ruang=Ruang::pluck('nama_ruang','id');
        $harii=Sekolah::all('daftar_hari','id')->first();
        if($harii != null){
        $hari= explode(',',$harii->daftar_hari);
        $hari=[$harii->id,$hari];
        $jumlah_jam=Sekolah::all('jumlah_jam')->first();
        $nama_rombel=Rombel::pluck('nama_rombel','id');
        }
        else{
            Session::flash('flash_msg','Data Sekolah anda belum ada silahkan isi kolom kolom di dibawah ini');
            return redirect('sekolah/create'); 
        }
        return view('jadwal/create',compact('guru','nama_ruang','hari','jumlah_jam','nama_rombel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
        $pelajaran = new Jadwal;
        $pelajaranCocok = Jadwal::all();
        // dd($pelajaranCocok[0]['id']  );
        foreach($pelajaranCocok as $pelajaranCocok){
            // dd();
            if($req->nama_ruang == $pelajaranCocok->id_ruang && $req->jam_awal == $pelajaranCocok->jam_awal && $req->nama_hari == $pelajaranCocok->nama_hari)
            {
                $nama_rombel = Rombel::find($pelajaranCocok['id_rombel']);
                Session::flash('flash_msg','data anda sama dengan '.$nama_rombel->nama_rombel );
                return redirect('ruang/tambah');
            }
            
        }
        $pelajaran->id_ruang = $req->nama_ruang;
        $pelajaran->jam_awal = $req->jam_awal;
        $pelajaran->jam_ahkir = $req->jam_terahkir;
        $pelajaran->nama_hari = $req->nama_hari;
        $pelajaran->jadwal_khusus = $req->jadwal_khusus;
        $pelajaran->id_guru = $req->guru;
        $pelajaran->id_rombel = $req->nama_rombel;
        $pelajaran->save();
        
        return redirect('jadwal');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = Jadwal::find($id);
        $nama_ruang = $jadwal->id_ruang;
        $nama_ruang = Ruang::find($nama_ruang);
        $nama_ruang =$nama_ruang->nama_ruang;
        $nama_guru = $jadwal->guru->kode_guru;
        $nama_rombel = $jadwal->rombel->nama_rombel;
        $jamke = [$jadwal->jam_awal,$jadwal->jam_ahkir];
        $nama_hari = $jadwal->nama_hari;

        return view('jadwal/detail',compact('nama_ruang','nama_rombel','jamke','nama_hari','nama_guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = $id;
        $data_jadwal = Jadwal::find($id); 
        $guru=Guru::pluck('kode_guru','id');
        $nama_ruang=Ruang::pluck('nama_ruang','id');
        $harii=Sekolah::all('daftar_hari','id')->first();
        if($harii != null){
        $hari= explode(',',$harii->daftar_hari);
        $hari=[$harii->id,$hari];
        $jumlah_jam=Sekolah::all('jumlah_jam')->first();
        $nama_rombel=Rombel::pluck('nama_rombel','id');
        }
        else{
            return redirect('sekolah/create'); 
        }
        

        return view('jadwal/edit',compact('id','data_jadwal','guru','nama_ruang','hari','jumlah_jam','nama_rombel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->jam_awal =$req->jam_awal; 
        $jadwal->jam_ahkir=$req->jam_ahkir; 
        $jadwal->nama_hari=$req->nama_hari; 
        $jadwal->id_guru=$req->nama_guru;   
        $jadwal->id_rombel=$req->nama_rombel; 
        $jadwal->id_ruang =$req->nama_ruang;
        $jadwal->update();
        return redirect('jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        Session::flash('flash_msg','Data Berhasil Dihapus');
        return redirect('jadwal');   
    }

    // cari fitur
    
    public function cari(Request $req)
    {
        // $ruang_all_data = Ruang::pluck('nama_ruang','id')->toArray();
        // dd($ruang_all_data);
        date_default_timezone_set('Asia/Jakarta');
        if($req['filter_1'] == 'cari')
        {
            // dd($req->nama_kelas);
            // ambil nama hati  ini
        $hari_ini = $this->dayChecker();
        // ambil nama rombel
        $kelas= Rombel::pluck('nama_rombel','id');
        $kelas = $kelas;
        // ambil data hari dan uraikan
        $hari = Sekolah::all('daftar_hari');
        $hari = explode(',',$hari[0]['daftar_hari']);
            $data = Jadwal::where('nama_hari','=',$req->nama_hari)->where('id_rombel','=',intval($req->nama_kelas))->get();
            $data = $data->toArray();
            if(count($data) == 1)
            {
            $data=$data[0];
            // dd($data);
            $jam_awal = $data['jam_awal'];
            $jam_ahkir = $data['jam_ahkir'];
            $jam =['awal' => $jam_awal,'ahkir' => $jam_ahkir];
            $jamke = $jam_awal;
            $jadwal_khusus = $data['jadwal_khusus'];
            $jam = $this->convertJam($jam,$jamke,$jadwal_khusus);
            $jam = $this->cekJam($jam);
            // dd(date('H:i:s',$jam));
            // dd($jam);
            $id = $data['id'];
            $nama_ruang = Ruang::find($data['id_ruang'])->toArray();
            $nama_ruang = $nama_ruang['nama_ruang'];
            $status= $jam;
            $nama_rombel = Rombel::find($data['id_rombel'])->toArray();
            $nama_rombel = $nama_rombel['nama_rombel'];
            $nama_guru = Guru::find($data['id_guru'])->toArray();
            $nama_guru = $nama_guru['kode_guru'];
            $daftar_hari = $data['nama_hari'];
            $data = ['nama_ruang' => $nama_ruang,'status' => $status,'id'=>$id,'daftar_hari' => $daftar_hari,'nama_rombel' => $nama_rombel,'nama_guru' => $nama_guru];
            $data2 = ['id' => $id,'kelas'=> $kelas,'hari' => $hari,'hari_ini' => $hari_ini];
            // 'id','kelas','hari','hari_ini'
            Session::flash('data',$data);
            Session::flash('data2',$data2);
            return redirect()->route('jadwal.index');       
            }

            elseif(count($data) > 1)
            {
                $ruang = $data;
                for($a=0;$a < count($ruang); $a++)
                {
                    $jadwal= Jadwal::find($ruang[$a]['id']);
                    $nama_ruang = $jadwal->id_ruang;
                    $nama_ruang = Ruang::find($nama_ruang);
                    $nama_ruang =$nama_ruang->nama_ruang;
                    $daftar_hari = $jadwal->nama_hari;
                    $nama_rombel = $jadwal->id_rombel;
                    $nama_rombel = Rombel::find($nama_rombel);
                    $nama_rombel = $nama_rombel->nama_rombel;
                    $nama_guru = $jadwal->id_guru;
                    $nama_guru = Guru::find($nama_guru);
                    $nama_guru = $nama_guru->kode_guru;
                    $jam_awal= $jadwal->jam_awal;
                    $jam_ahkir= $jadwal::find($ruang[$a]['id'])->jam_ahkir;
                    $jam =['awal' => $jam_awal,'ahkir' => $jam_ahkir];
                    $jamke = $jam_awal;
                    $jam = $this->convertJam($jam,$jamke);
                    // echo date('H:i:s',$jam) .'<br>';
                    $jam = $this->cekJam($jam);
                    $id []= Jadwal::find($ruang[$a]['id'])->id;
                    $dataBaru[] = ['nama_ruang' => $nama_ruang,'status' => $jam,'id'=>$id[$a],'daftar_hari' => $daftar_hari,'nama_rombel' => $nama_rombel,'nama_guru' => $nama_guru];
                }
                $data2 = ['id' => $id,'kelas'=> $kelas,'hari' => $hari,'hari_ini' => $hari_ini];
                Session::flash('data3',$dataBaru);
                Session::flash('data4',$data2);
                return redirect()->route('jadwal.index');
                
            }
            
            else{
                Session::flash('flash_msg','data pencarian tidak ada');
                return redirect('jadwal');
            }
        }

        elseif($req['filter_2'] == 'cari')
        {
            $ruang_all_data = Ruang::pluck('nama_ruang','id')->toArray();
            $hari_ini = strtolower($this->dayChecker());
            $ruang_aktif = [];
            if($req['kelas_kosong'] == 'on')
            {
                $ruang_all_data = Ruang::pluck('nama_ruang','id')->toArray();
                // dd($ruang_all_data);
                $ruang_all = Ruang::pluck('id','nama_ruang')->toArray();
                $jadwal = Jadwal::all();
                // dd($jadwal);
                foreach($jadwal as $row)
                {
                    $jam_awal= $row->jam_awal;
                    $jamke = $jam_awal;
                    $hari = $row->nama_hari;
                    $jam_ahkir= $row::find($row['id'])->jam_ahkir;
                    $jam =['awal' => $jam_awal,'ahkir' => $jam_ahkir];
                    $jam = $this->convertJam($jam,$jamke);
                    $jam = $this->cekJam($jam);
                    
                    if($jam == 'active' && $hari == $hari_ini )
                    {
                        $ruang_aktif []= $row->id_ruang ;
                    }
                }
                if(count($ruang_aktif) != 0)
                {
                    for($a=0;$a < count($ruang_aktif);$a++)
                    {
                        if(array_search($ruang_aktif[$a],$ruang_all) != null )
                        {
                            unset($ruang_all_data[$ruang_aktif[$a]]);
                        }
                    }
                    
                    Session::flash('data5',$ruang_all_data);
                    return redirect()->route('jadwal.index');
                }
                else
                {
                    Session::flash('data5',$ruang_all_data);
                    return redirect('jadwal');
                }
            }
            
            if($req['lab_kosong'] == 'on')
            {
                $ruang_all_data = Ruang::pluck('nama_ruang','id')->toArray();
                // dd($ruang_all_data);
                $ruang_all = Ruang::where('nama_ruang','LIKE','%lab%')->get()->toArray();
                foreach($ruang_all as $key => $value){
                    $ruang_all_jadi[$value['id']]=$value['nama_ruang'];
                    // echo $value['nama_ruang'];
                }   
                // dd($ruang_all_jadi);

                $jadwal = Jadwal::all();
                foreach($jadwal as $row)
                {
                    $jam_awal= $row->jam_awal;
                    $jamke = $jam_awal;
                    $hari = 'rabo';
                    $jam_ahkir= $row->jam_ahkir;
                    $jam =['awal' => $jam_awal,'ahkir' => $jam_ahkir];
                    $jam = $this->convertJam($jam,$jamke);
                    $jam = $this->cekJam($jam);

                    if($jam == 'active' && $hari == $hari_ini )
                    {
                        $ruang_aktif []= $row->nama_ruang ;
                    }
                }
                
                if(count($ruang_aktif) != 0)
                {
                    for($a=0;$a < count($ruang_aktif);$a++)
                    {
                        // dd(array_search(,$ruang_all_jadi));
                        if(array_search($ruang_aktif[$a],$ruang_all_jadi) !== null)
                        {
                            unset($ruang_all_jadi[$ruang_aktif[$a]]);
                        }
                    }
                    // dd($ruang_all_jadi);    
                   
                    Session::flash('data7',$ruang_all_jadi);
                    return redirect()->route('jadwal.index');
                }

                else
                {
                    Session::flash('data7',$ruang_all_jadi);
                    return redirect('jadwal');
                }
            }
                
                
            }

            if($req['guru_kosong'] == 'on')
            {   

                // $ruang_all_data = Ruang::pluck('nama_ruang','id')->toArray();
                $guru_all_data = Guru::pluck('kode_guru','id')->toArray();
                $ruang_all = Guru::all()->toArray();
                foreach($ruang_all as $row)
                {
                    $ruang_all2 [$row['kode_guru']]= $row['id']; 
                }
                $jadwal = Jadwal::all();
                foreach($jadwal as $row)
                {
                    $jam_awal= $row->jam_awal;
                    $jamke = $jam_awal;
                    $hari = $row->nama_hari;
                    $jam_ahkir= $row::find($row['id'])->jam_ahkir;
                    $jam =['awal' => $jam_awal,'ahkir' => $jam_ahkir];
                    $jam = $this->convertJam($jam,$jamke);
                    $jam = $this->cekJam($jam);
                    
                    if($jam == 'active' && $hari == $hari_ini )
                    {
                        $ruang_aktif []= $row->id_guru ;
                    }
                }

                if(count($ruang_aktif) != 0)
                {
                    for($a=0;$a < count($ruang_aktif);$a++)
                    {
                        if(array_search($ruang_aktif[$a],$ruang_all2) != null )
                        {
                            unset($guru_all_data[$ruang_aktif[$a]]);
                        }
                    }
                    Session::flash('data6',$guru_all_data);
                    return redirect()->route('jadwal.index');
                }

                else
                {
                    Session::flash('data6',$guru_all_data);
                    return redirect('jadwal');
                }

            }   
        
        elseif(isset($req['filter_3']))
        {
            // dd($req['filter_3']);
            $hari_ini = $this->dayChecker();
            $hari_ini = strtolower($hari_ini);
            Session::flash('hari_ini',$hari_ini);
            Session::flash('cari_langsung',$req['filter_3']);
            return redirect()->route('jadwal.index');
        }
        else
        {
            redirect('jadwal');
        }
    }

    
// baris ahkir function 

private function convertJam($jam,$jamke,$jadwal_khusus = null)
{
    $jam_pulang = Sekolah::select('jam_pulang')->first();
    $jam_pulang=strtotime(date($jam_pulang['jam_pulang']));
    $jam_masuk=Sekolah::all('jam_masuk')->first();
    $jam_masuk = $jam_masuk['jam_masuk'];
    $detik = Sekolah::select('perjam')->first();
    $detik = $detik['perjam'] * 60 ;
    $jam_istirahat = Sekolah::select('jam_istirahat')->first();
    $jam_istirahat = $jam_istirahat['jam_istirahat'];
    $durasi_istirahat = 30;
    // dd($jadwal_khusus);
    if ($jadwal_khusus == 'senin_upacara') {
        $jam_masuk = '07:15';
        $detik = 40 * 60;
        $jam_istirahat= '09:55:00/12:30:00';
        $durasi_istirahat = 35;
    }

    $jam_istirahat = $jam_istirahat;
    $jam_istirahat = explode('/',$jam_istirahat);
    $jam_masuk_upacara = strtotime($jam_masuk);
    // dd($jam_masuk_upacara);
    $jumlah_jam = Sekolah::select('jumlah_jam')->first();
    $jumlah_jam = $jumlah_jam['jumlah_jam']; 
    
    if ($jumlah_jam == 11) {
        $jumlah_jam += 1;
    }
    
    // dd(date('H:i:s',$jam_masuk_upacara));
    $jamke_istirahat= $this->jamke_istirahat($jam_masuk_upacara,$jam_istirahat,$detik,$jumlah_jam,$durasi_istirahat);

    if($jamke == 1){
        $jam_mulai = $jam_masuk;
    }   
    elseif($jamke > 1 && $jamke <= $jumlah_jam['jumlah_jam'] )
    {
        if(count($jam_istirahat) > 1)
        {
            if($jamke > 1 && $jamke < $jamke_istirahat['pertama'] )
            {
                $jamke-=1;
                $jam_mulai = $jam_masuk + ($jamke * $detik);
            }
            elseif($jamke > $jamke_istirahat['pertama'] && $jamke < $jamke_istirahat['kedua'] )
            {
                $jamke-=1;
                $jamke -= $jamke_istirahat['pertama'];
                $jam_masuk = strtotime($jamke_istirahat['jam_mulai_istirahat1']);
                if($jamke == 0)
                {
                    $jam_mulai = $jam_masuk + (1 * $detik);
                }
                else
                {
                    $jam_mulai = $jam_masuk + ($jamke * $detik);
                }
            }

            else
            {
                $jamke -= $jamke_istirahat['kedua'];
                $jam_masuk = $jamke_istirahat['jam_mulai_istirahat2'];
                if($jamke == 0)
                {
                    $jam_mulai = $jam_masuk + (1 * $detik);
                }
                else
                {
                    $jam_mulai = $jam_masuk + ($jamke * $detik);
                }
            }

    }

}

    

    else
    {
        $jam_mulai = $jam_masuk_upacara;
    }
    
        if($jam['ahkir'] - $jam['awal'] == 0)
        {
            $jumlahjam = 1;
            $jam = $jumlahjam * $detik;
            $jam = $jam_mulai + $jam;
            return $jam;
        }
        $jumlahjam = ($jam['ahkir'] - $jam['awal']);
        $jam = $jumlahjam * $detik;
        $jam = $jam_mulai + $jam;
        
        return $jam;
    }
    
    private function jamke_istirahat($jam_masuk,$jam_istirahat,$detik,$jumlah_jam,$durasi_istirahat)
    {
        // dd(date('H:i:s',$jam_masuk_upacara));
        for($a=1;$a <=  $jumlah_jam ; $a++ )
        {
            // dd(date('H:i:s',$jam_masuk + ($detik * $a)));
            if(count($jam_istirahat) > 1)
            {
                
                for($a=1;$a <=  $jumlah_jam ; $a++ )
                {
                    if($jam_masuk + ($detik * $a) == strtotime($jam_istirahat[0]))
                    {
                        // dd('hai1');
                        $jam_mulai_istirahat1= $jam_masuk + ($detik * $a) + ($durasi_istirahat * 60);
                        $jamke_istirahat1 =$a;
                    }
                }
                for($a=1;$a <=  $jumlah_jam ; $a++ )
                {
                    // dd(date('H:i:s',$jam_masuk + ($detik * 8) - 300));
                    // dd($jam_masuk + ($detik * 8) - 300 == strtotime($jam_istirahat[1]) );
                    if($jam_masuk + ($detik * $a) - 300 == strtotime($jam_istirahat[1])) {
                        // dd('hai1');
                        $jam_mulai_istirahat2= strtotime($jam_istirahat[1]) + ($durasi_istirahat*60);
                        $jamke_istirahat2 =$a;
                    // dd(date('H:i:s',$jamke_istirahat2);
                }

            }
            // dd($jamke_istirahat2);
                return $jamke_istirahat=['pertama'=> $jamke_istirahat1,'jam_mulai_istirahat1'=>$jam_mulai_istirahat1,'kedua'=>$jamke_istirahat2,'jam_mulai_istirahat2' => $jam_mulai_istirahat2];
            }
        
        // {
            
        // }
        
        elseif($jam_masuk + ($detik * $a) == strtotime($jam_istirahat[0]))
        { 
            $jam_mulai_istirahat1= $jam_masuk + ($detik * $a);
            $jamke_istirahat1=$a;
            $jamke_istirahat=['pertama'=>$jamke_istirahat1,'jam_mulai_istirahat1' => $jam_mulai_istirahat1];
            return $jamke_istirahat;
        }
        
        
    }
}


private function cekJam($jam)
{
    // $jam=strtotime(date('G:i:s'));
    $jam_masuk = Sekolah::all('jam_masuk');
    $jam_masuk = $jam_masuk[0]['jam_masuk'];
    $jam_masuk=strtotime(date($jam_masuk));
    $jam_sekarang = time();
    $jam_pulang = Sekolah::all('jam_pulang');
    $jam_pulang = $jam_pulang[0]['jam_pulang'];
    $jam_pulang=strtotime(date($jam_pulang));
    // dd(date('H:i:s',$jam),date('H:i:s',$jam_masuk));
    // if()
// dd($jam);
    if($jam_sekarang < $jam_masuk)
    {
        return $status = 'unactive';
        
    }

    elseif($jam_sekarang >= $jam_pulang)
    {
        return $status = 'unactive';
    }   
    
    elseif($jam_sekarang >= strtotime('12:15:00') && $jam_sekarang <= strtotime('12:45:00'))
    {
        return $unactive = 'unactive';
    }

    elseif($jam_sekarang >= strtotime('09:30:00') && $jam_sekarang <= strtotime('10:00:00'))
    {
        return $status = 'unactive';
    }

    else
    {
        if($jam_sekarang <= $jam)
        {
            return $status = 'active';
        }
        
        else
        {
            return $status = 'unactive' ;
        }
    }
    

    return 0;
}

private function dayChecker()
{
    $hari = date('D');
    
    $daftar_hari = [
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabo',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu',
    ];

    return $daftar_hari[$hari]; 
}


}