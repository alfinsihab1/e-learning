<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    #menampilkan halaman data lengkap
    public function index(){

       
        $total_siswa = User::where('akses','=','siswa')->count();
        $total_guru = User::where('akses','=','guru')->count();
        $total_mapel = Mapel::all()->count();

        $tampil_soal = DB::table('soals')
            ->join('mapels','soals.id_mapel','=','mapels.id_mapel')
            ->select('mapels.nama_mapel', 'soals.judul_soal','soals.id_soal')
            ->get();

        return view('admin.index',[
            'total_siswa'=>$total_siswa,
            'total_guru'=>$total_guru,
            'total_mapel'=>$total_mapel,
            'tampil_soal' => $tampil_soal
        ]);
    }
    #get data list guru
    public function getGuru(){
        $get_guru = User::where('akses','=','guru')->get();

        return view('admin.getGuru',[
            'daftar_guru' => $get_guru
        ]);
    }
    #get data list siswa
    public function getSiswa(){
        $get_siswa = User::where('akses','=','siswa')->get();

        return view('admin.getSiswa',[
            'daftar_siswa' => $get_siswa
        ]);
    }


    // form untuk menambahkan pengguna
    public function create(){
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required',
            'akses' => 'required',
            'no_induk' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()){
            // Back to form page with validation error messages
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        else{
            
            $user = new User();
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->nohp = $request->no_hp;
            $user->akses = $request->akses;
            $user->no_induk = $request->no_induk;
            $user->password = bcrypt($request->password);
            $user->save();

            if($request->akses == 'siswa'){

                $kelas = new Kelas();
                $kelas->nama_kelas = $request->nama_kelas;
                $kelas->id_user = $user->id;
                
                $kelas->save();
            }

            
            return redirect()->route('admin.index')->with('message','Data Berhasil Ditambahkan');;
        }
    }

    #menampilkan halaman form
    public function edit(Request $request,$id){
 
        $get_data = User::where('id','=',$request->id)->first();
        $kelas = Kelas::first();

        $cek_kelas = DB::table('kelas')
                    ->join('users','kelas.id_user','=','users.id')
                    ->select('kelas.*')
                    ->where('kelas.id_user','=',$id)
                    ->first();

        return view('admin.edit',[
            'get_data' => $get_data,
            'cek' => $cek_kelas,
            'kelas' => $kelas
            
        ]);
    }

    public function update(Request $request, $id){

        $get_data = User::where('id','=',$request->id)->first();

        $validator = Validator::make($request->all(),  [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,'.$get_data->id,
            'no_hp' => 'required',
            'akses' => 'required',
            'no_induk' => 'required'
        ]);

        if($validator->fails()){
            // Back to form page with validation error messages
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        else{     
            $user = User::find($id);
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->nohp = $request->no_hp;
            $user->akses = $request->akses;
            $user->no_induk = $request->no_induk;
            $user->update();

            return redirect()->route('admin.index')->with('message','Data Berhasil Diubah');
        }
    }

    public function delete(Request $request){
        $user = User::find($request->id);
        $user->delete();

        return redirect()->route('admin.index')->with('delete_message','Data Berhasil Dihapus');;
    }
}
