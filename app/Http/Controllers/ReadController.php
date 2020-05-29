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
        $value =DB::table('reads')->where('id',$id)->pluck('value');

        return  $value[0];
    }


    public function store(Request $request)
    {
        $date = date("Y-m-d h:i:s");
        return DB::table('equipamentos')->insertGetId(
            [  
                "mac_address" =>$request['mac_address'], 
                "rssi" => $request['rssi'],
                "luz" => $request['luz'],
                "time_stamp" => $date,
                "distancia" => $request['distancia'],
                "nome" => $request['nome'],
                "id_divisao" => $request['id_divisao'],
                'created_at' => $date,
                "updated_at" => $date
            ]);
    }
    
    
}
