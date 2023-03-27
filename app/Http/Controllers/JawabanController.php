<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function simpan(Request $request,$user_id,$id, $idm)
    {
        $count = $request->count;
        $jawaban_opsi = [];

        for($i=1;$i<=$count;$i++){
            $jawaban_opsi[$i] = $request['opsi'.$i];
        }
        dd($jawaban_opsi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user,$id, $idm)
    {
        $data = $request->all();

        $list_jawaban = $request->jawaban;
        $x = count($list_jawaban) - 1;
        
        $a=array();
        for($i=0;$i<=$x ;$i++){
            $a[$i+1] = array();
            $a[$i+1] = $list_jawaban[$i];
        }

        $jawaban_baru = new Jawaban();
        $jawaban_baru->id_user = Auth::id();
        $jawaban_baru->id_mapel = $id;
        $jawaban_baru->id_soal = $idm;
        $jawaban_baru->jawaban_soal = json_encode($a);
        $jawaban_baru->save();

     
        $user = Auth::akses();
        return redirect()->route($user.'.index')->with('message','Soal Selesai Dikerjakan');     
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jawaban  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function show(Jawaban $jawaban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jawaban  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function edit(Jawaban $jawaban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jawaban  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jawaban $jawaban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jawaban  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jawaban $jawaban)
    {
        //
    }
}
