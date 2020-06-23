<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ReadController extends Controller
{

    public function store(Request $request)
    {
        $date = date("Y-m-d H:i:s");
        if($request!= null){
        return DB::table('equipamentos')->insertGetId(
            [  
                "mac_address" =>$request->input('mac_address'), 
                "rssi" => $request->input('rssi'),
                "luz" => $request->input('luz'),
                "time_stamp" => $date,
                "distancia" => $request->input('distancia'),
                "nome" => $request->input('nome'),
                "id_divisao" => $request->input('id_divisao'),
                "created_at" => $date,
                "updated_at" => $date
            ]);
        }
    }

    public function updateValue(Request $request, $id)
    {
        return DB::table('divisoes')->where('id',$id)->update(
            [  
                "valor" =>$request->input('valor'), 
            ]);
        
    }
    
    
}
