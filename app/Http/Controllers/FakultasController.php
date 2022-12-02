<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FakultasController extends Controller
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
        $response['message'] = "Data Fakultas";
        $response['success'] = true;
        $response['data'] = \DB::table('fakultas')->select('FakultasID','Nama')->get();
        return response()->json($response);
    }
}
