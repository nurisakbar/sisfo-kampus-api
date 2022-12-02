<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
class MahasiswaController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $perPage    = $request->per_page??10;
        $mahasiswa  = Mahasiswa::select(
            'mhsw.MhswID as nim',
            'mhsw.Nama as nama',
            'statusmhsw.nama as status_mahasiswa',
            'program.Nama as nama_program',
            'prodi.Nama as nama_prodi',
            'fakultas.Nama as nama_fakultas'
            )
        ->join('statusmhsw','statusmhsw.StatusMhswID','mhsw.StatusMhswID')
        ->join('program','program.programID','mhsw.programID')
        ->join('prodi','prodi.ProdiID','mhsw.ProdiID')
        ->join('fakultas','fakultas.FakultasID','prodi.FakultasID');

        if($request->has('nama')){
            $mahasiswa->where('mhsw.Nama','like',"%".$request->nama."%");
        }

        if($request->has('nim')){
            $mahasiswa->where('mhsw.MhswID','like',"%".$request->nim."%");
        }

        $response['message'] = "Data Mahasiswa";
        $response['success'] = true;
        $response['data']    = $mahasiswa->limit($perPage)->get();
        return response()->json($response);
    }
}
