<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\PilihanGanda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PilihanGandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        return view('mapel.soal.pilihan_ganda.create',[
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

        $a = array();
        $b = array();
        $list_soal = $request->soal;
        $x = count($list_soal) - 1;
        $y = count($newArray);

   
        
        for($i=0;$i<=$x ;$i++){
            $a[$i+1] = array();
            $a[$i+1] = $list_soal[$i];
        }

        for($j=0;$j<$y;$j++){
            $b[$j+1] = array();
            $b[$j+1] = $newArray[$j];
        }
        
        $soal_baru = new PilihanGanda();
        $soal_baru->id_kelas = $request->id_kelas;
        $soal_baru->judul_soal = $request->judul_soal;
        $soal_baru->id_mapel = $request->id_mapel;
        $soal_baru->opsi = json_encode($b);
        $soal_baru->id_user = Auth::id();
        $soal_baru->soal = json_encode($a);

        
        $soal_baru->save();

        return redirect()->route('soal.index')->with('message','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PilihanGanda  $pilihanGanda
     * @return \Illuminate\Http\Response
     */
    public function show(PilihanGanda $pilihanGanda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PilihanGanda  $pilihanGanda
     * @return \Illuminate\Http\Response
     */
    public function edit(PilihanGanda $pilihanGanda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PilihanGanda  $pilihanGanda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PilihanGanda $pilihanGanda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PilihanGanda  $pilihanGanda
     * @return \Illuminate\Http\Response
     */
    public function destroy(PilihanGanda $pilihanGanda)
    {
        //
    }
}
