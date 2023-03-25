<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Jawaban;
use App\Models\PilihanGanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_mapel = Mapel::all();
        
        return view('mapel.soal.soalindex',[
            'daftar_soal' => $daftar_mapel
        ]);
    }

    public function detail($id){

        $kelas = Kelas::select('nama_kelas')->where('id_user','=',Auth::id())->first();   
        $soal = Soal::where([
            ['id_mapel','=',$id],
            ['id_kelas','=',$kelas->nama_kelas]
        ])->get();

        $pilgan = PilihanGanda::where([
            ['id_mapel','=',$id],
            ['id_kelas','=',$kelas->nama_kelas]
        ])->get();

        // $soal = Soal::where('id_mapel','=',$id)->get();
        
        return view('mapel.soal.detail',[
            'soal' => $soal,
            'pilgan' => $pilgan
            
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::pluck('nama_mapel','id_mapel');
        $nomor = 1;
        return view('mapel.soal.create',[
            'daftar_mapel' => $mapel,
            'no' => $nomor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $list_opsi = $request->opsi;
        $jumlah_opsi = count($request->opsi);
        $bagi_opsi = ceil($jumlah_opsi/5);

        for($i = 0;$i < $bagi_opsi; $i++){
            $start = $i * 5;
            $cok = array_slice($list_opsi, $start, 5);
            $newArray[] = $cok;
        }

        dd($request->soal);


        $a = array();
        $list_soal = $request->soal;
        $x = count($list_soal) - 1;
        
        
        for($i=0;$i<=$x ;$i++){
            $a[$i+1] = array();
            $a[$i+1] = $list_soal[$i];
        }

        $soal_baru = new Soal();
        $soal_baru->id_kelas = $request->id_kelas;
        $soal_baru->judul_soal = $request->judul_soal;
        $soal_baru->id_mapel = $request->id_mapel;
        $soal_baru->id_user = Auth::id();
        $soal_baru->soal = json_encode($a);

        
        $soal_baru->save();

        return redirect()->route('soal.index')->with('message','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
            $cek_soal_1 = DB::table('soals')
                            ->join('mapels','soals.id_mapel','mapels.id_mapel')
                            ->select('soals.*','mapels.nama_mapel',)
                            ->where([
                                ['soals.id_soal','=', $request->idm],
                                ['mapels.id_mapel', '=', $request->id]
                            ])
                            ->first();
            

            $mapel = Mapel::select('id_mapel','nama_mapel')->get();
            
            $cek_soal_1->soal = json_decode($cek_soal_1->soal, true);
            $count = count($cek_soal_1->soal);
            

            
            
        if(Auth::akses() == 'admin' || Auth::akses() == 'guru'){
            return view('mapel.soal.edit',[
                'daftar_mapel' => $mapel,
                'soal' => $cek_soal_1,
                'count' => $count,
            ]);
        }
        elseif(Auth::akses() == 'siswa'){

            if(Jawaban::where([
                ['id_soal', $request->idm],
                ['id_mapel', $request->id],
                ['id_user', Auth::id()]
                ])->exists()) {

                    $jawaban_murid = jawaban::where([
                        ['id_soal','=', $request->idm],
                        ['id_mapel', '=', $request->id]
                    ])->first();
        
                    $jawaban_murid->jawaban_soal = json_decode($jawaban_murid->jawaban_soal, true);

                    return view('siswa.soal.soalindex',[
                        'daftar_mapel' => $mapel,
                        'soal' => $cek_soal_1,
                        'count' => $count,
                        'dis' => 'disabled',
                        'jawaban' => $jawaban_murid,
                        'cek' => true,
                        'display' => 'none'
                    ]);

            }
            else{
                return view('siswa.soal.soalindex',[
                'daftar_mapel' => $mapel,
                'soal' => $cek_soal_1,
                'count' => $count,
                'dis' => '',
                'display' => 'block',
                'cek' => false,
                'jawaban' => ''
                ]);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,$idm)
    {

        $data = $request->all();
        $list_soal = $request->soal;
        
        $x = count($list_soal) - 1;
        
        $a=array();
        for($i=0;$i<=$x ;$i++){
            $a[$i+1] = array();
            $a[$i+1] = $list_soal[$i];
        }
        $soal_baru = Soal::find($idm);
        
        $soal_baru->judul_soal = $request->judul_soal;
        $soal_baru->id_mapel = $request->id_mapel;
        $soal_baru->soal = json_encode($a);
        
        $soal_baru->save();

        return redirect()->route('mapel.soal', $request->id_mapel)->with('message','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        //
    }
}
