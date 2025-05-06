<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {

        $siswa = DB::table('siswas')
            ->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
            ->join('wali_murid', 'siswas.id_wali', '=', 'wali_murid.id')
            ->select('siswas.*', 'kelas.nama_kelas', 'wali_murid.nama_wali')
            ->get();

        return view('siswa', ['siswa' => $siswa]);
    }

    public function destroy($id)
    {
        $siswa = DB::table('siswas')
            ->where('id', $id)
            ->delete();

            return redirect('/');
    }

    public function create()
    {
        $kelas = DB::table('kelas')->get();

        $wali = DB::table('wali_murid')->get();

        return view('siswa_form', ['wali' => $wali, 'kelas' => $kelas]);
    }

    public function store()
    {
        $request->validate([
            'nis' => 'required|unique:siswas',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'id_kelas' => 'required',
            'id_wali' => 'required'
        ]);

        DB::table('siswas')->insert([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_kelas' => $request->id_kelas,
            'id_wali' => $request->id_wali
        ]);


    }
}