<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $mapel = Mapel::all();
        $mapel_asc = $mapel->sortBy('id_mapel');
        if(Auth::akses()=='admin'){
            return view('mapel.index',[
                'daftar_mapel' => $mapel_asc
            ]);
        }
        if(Auth::akses()=='guru'){
            return view('mapel.index',[
                'daftar_mapel' => $mapel_asc
            ]);
        }
            
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'nama_mapel' => 'required',
            'id_mapel' => 'required|unique:mapels',
        ]);

        if($validator->fails()){
            // Back to form page with validation error messages
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        else{
            
            $user = new Mapel();
            $user->nama_mapel = $request->nama_mapel;
            $user->id_mapel = $request->id_mapel;
            $user->save();

            return redirect()->route('mapel.index')->with('message','Data Berhasil Ditambahkan');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show($id_mapel)
    {
        $get_data = Mapel::where('id_mapel','=', $id_mapel)->first();
        return view('mapel.edit',[
            'get_data' => $get_data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mapel)
    {
        $get_data = Mapel::where('id_mapel','=',$id_mapel)->first();
        
        $validator = Validator::make($request->all(),  [
            'nama_mapel' => 'required',
            'id_mapel' => 'required|unique:mapels,id_mapel,'.$id_mapel.',id_mapel',
        ]);
        
        if($validator->fails()){
            // Back to form page with validation error messages
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        else{
            
            $user = Mapel::find($id_mapel);
            
            $user->nama_mapel = $request->nama_mapel;
            $user->id_mapel = $request->id_mapel;

            $user->save();

            return redirect()->route('mapel.index')->with('message','Data Berhasil Ditambahkan');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Mapel::find($request->id_mapel);
        $user->delete();

        return redirect()->route('mapel.index')->with('delete_message','Data Berhasil Dihapus');;
    
    }
}
