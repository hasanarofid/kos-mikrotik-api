<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;

class LogController extends Controller
{
    public function index() {
      
        return view('rebbot.index');
        
    }

    public function log(){

$host ="103.158.155.7";
$user = "wahyu";
$pass = "wahyu2000";
        $client = new Client([
            'host' => $host,
            'user' =>  $user,
            'pass' => $pass
        ]);
        
         $data = $client->query('/log/print')->read();
        // $sukses = 'berhasil reboot';
        
        return view('log.index', compact('data'));
    }
}