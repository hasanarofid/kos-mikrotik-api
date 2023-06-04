<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;

class TrafficController extends Controller
{
    public function index() {
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        
    
        // $data = $client->query('/interface/monitor-traffic/print')->read();
        // Build monitoring query
$query =
(new Query('/interface/monitor-traffic'))
    ->equal('interface', 'ether1')
    ->equal('once');

// Ask for monitoring details
$grafik = $client->query($query)->read();
// print_r($out);
        //  $user = collect($data)->except(['0'])->toArray(); 
        //  dd($out);
     
         // $aktif = $client->query('/interface/pppoe-client/getall')->read();

        return view('traffik.index', compact('grafik'));
        
    }

    public function data(Request $request){
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

$interface = $_GET["interface"]; ;

    $query =
(new Query('/interface/monitor-traffic'))
    ->equal('interface', $interface);
    // ->equal('once','daily');
  
    $grafik = $client->query($query)->read();
    $rows = array(); $rows2 = array();
// dd($grafik);die;
    $ftx = $grafik[0]['tx-bits-per-second'];
    $frx = $grafik[0]['rx-bits-per-second'];

      $rows['name'] = 'Tx';
      $rows['data'][] = $ftx;
      $rows2['name'] = 'Rx';
      $rows2['data'][] = $frx;
      
      
 


    $result = array();
    

    array_push($result,$rows);
    array_push($result,$rows2);
    print json_encode($result);

    }


}