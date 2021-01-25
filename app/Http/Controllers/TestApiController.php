<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestApiController extends Controller
{
    //
    public function test(Request $req){
        return response()->json([
            'status'=>200,
            'message'=>'successfully created an api. Hongera'
        ]);
    }
}
