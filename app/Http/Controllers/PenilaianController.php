<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Kelas;
use App\Models\Jawaban;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $semua_soal = Soal::with('mapel')->get();
        $kelas_A = Kelas::where('nama_kelas','=',$request->nama_kelas)->count();
        $kelas_Asu = Kelas::where('nama_kelas','=',1)->count();



        // $semua_soal = Soal::all();
        $semua_soal = DB::table('soals')
            ->join('mapels', 'soals.id_mapel', '=', 'mapels.id_mapel')
            ->select('soals.*','mapels.nama_mapel')
            ->where('id_kelas','=',1)
            ->get();

        
        
        $soal_s = DB::table('soals')
            ->join('mapels', 'soals.id_mapel', '=', 'mapels.id_mapel')
            ->select('soals.*','mapels.nama_mapel')
            ->where('id_kelas','=',$request->nama_kelas)
            ->get();
          

        if($request->ajax()){
            $filter_soal = $soal_s;
            $kelas_As = $kelas_A;
            
            return response()->json([
                'filtesr'=>$filter_soal,
                'kelasa'=>$kelas_As,
               
            ]);
        }

        return view('penilaian.index',[
            'soals'=> $semua_soal,
            'kelakus' => $kelas_Asu,
            'i'=>0,         
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Penilaian $penilaian)
    {
        $idk = $request->idk;
        return view('penilaian.detail',[
            'idk' => $idk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian $penilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        //
    }
}
