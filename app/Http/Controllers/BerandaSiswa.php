<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jawaban;
use App\Models\PilihanGanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BerandaSiswa extends Controller
{

    public function index(){

        $kelas = Kelas::select('nama_kelas')->where('id_user','=',Auth::id())->first();   
    
        $mapel = Soal::where('id_kelas','=',$kelas->nama_kelas)->get();
        $pilgan = PilihanGanda::where('id_kelas','=',$kelas->nama_kelas)->get();
        $cek_soal_done = Jawaban::where([
            ['id_user','=', Auth::id()],
        ])->get();


        return view('siswa.index',[
            'soal' => $mapel,
            'cek' => $cek_soal_done,
            'pilgan'=>$pilgan
        ]);
    }

    public function cek($user,$id, $id_user){

       
        $soal= Soal::where('id_soal','=',$id)->first();
        $soal->soal = json_decode($soal->soal, true);
        $count = count($soal->soal);

        $jawaban = Jawaban::where([
            ['id_user','=',$id_user],
            ['id_soal', '=', $id]
        ])->first();

        $jawaban->jawaban_soal = json_decode($jawaban->jawaban_soal, true);

        return view('siswa.soal.cek',[
            'soal' => $soal,
            'count' => $count,
            'jawaban' => $jawaban
        ]);
    }

}
