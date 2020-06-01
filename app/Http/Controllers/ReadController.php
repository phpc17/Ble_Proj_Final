<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ReadController extends Controller
{
    public function update(Request $request)
    {
        $array[] = $request;
        if($request['sensor_type'] == 'Temperatura Ar'){

        return DB::table('reads')->where('id',1)->update(
            [   
                'value' => $request['value'], 
                'datetime' => $request['datetime'],
            ]);
        }

        if($request['sensor_type'] == 'Humidade Ar'){

        return DB::table('reads')->where('id',2)->update(
            [   
                'value' => $request['value'], 
                'datetime' => $request['datetime'],
            ]);
        }

        if($request['sensor_type'] == 'Luminosidade'){

            return DB::table('reads')->where('id',3)->update(
                [   
                    'value' => $request['value'], 
                    'datetime' => $request['datetime'],
                ]);
            }
        
        if($request['sensor_type'] == 'CO2'){

            return DB::table('reads')->where('id',4)->update(
                [   
                    'value' => $request['value'], 
                    'datetime' => $request['datetime'],
                ]);
            }
        
        if($request['sensor_type'] == 'Humidade Solo'){

            return DB::table('reads')->where('id',5)->update(
                [   
                    'value' => $request['value'], 
                    'datetime' => $request['datetime'],
                ]);
            }
        
        if($request['sensor_type'] == 'Temperatura Agua'){

            return DB::table('reads')->where('id',6)->update(
                [   
                    'value' => $request['value'], 
                    'datetime' => $request['datetime'],
                ]);
            }

        if($request['sensor_type'] == 'Nivel Agua Tanque'){

            return DB::table('reads')->where('id',7)->update(
                [   
                    'value' => $request['value'], 
                    'datetime' => $request['datetime'],
                ]);
            }

    }

    public function show($id)
    {
        $value =DB::table('reads')->where('id',1)->pluck('value');
        
        return  $value[0];
    }


    public function store(Request $request)
    {
        $date = date("Y-m-d h:i:s");
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
