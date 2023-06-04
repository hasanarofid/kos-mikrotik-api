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
            $client = new Client([
                'host' => env("host"),
                'user' =>  env("user"),
                'pass' => env("pass")
            ]);        
         $data = $client->query('/log/print')->read();
        // $sukses = 'berhasil reboot';
        
        return view('log.index', compact('data'));
    }
}