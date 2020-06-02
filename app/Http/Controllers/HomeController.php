<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\User;
use Illuminate\Http\Request;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $users = User::count();

        
        $divisoes = DB::table('divisoes')->get();
        if ($request->has('data')) {
            $equipamentos = DB::table('equipamentos')->whereDate('time_stamp',$request->data)->orderBy('time_stamp','desc')->paginate(8);
        }else{
            $equipamentos = DB::table('equipamentos')->orderBy('time_stamp','desc')->paginate(8);
        }
        $array = array();

        foreach($equipamentos as $equipamento) {
            $lastRead = DB::table('equipamentos');
            
           if($lastRead != null) {
                    array_push($array, array(
                        "mac_address" =>$equipamento->mac_address, 
                        "rssi" => $equipamento->rssi,
                        "luz" => $equipamento->luz,
                        "time_stamp" => $equipamento->time_stamp,
                        "distancia" => $equipamento->distancia,
                        "nome" => $equipamento->nome,
                        "id_divisao" => $equipamento->id_divisao,

                    ));
                }
            }

        $widget = [
            'users' => $users,
            //...
        ];
        return view('home',compact('array','equipamentos','divisoes'));
    }
    

}
