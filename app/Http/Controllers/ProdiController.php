<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdiController extends Controller
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
        $response['message'] = "Data Program Studi";
        $response['success'] = true;
        $response['data'] = \DB::table('prodi')->select('ProdiID','FakultasID','Nama')->get();
        return response()->json($response);
    }
}
