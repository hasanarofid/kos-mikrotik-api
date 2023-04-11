<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;

class RebootController extends Controller
{
    public function index() {
      
        return view('rebbot.index');
        
    }

    public function reboot(){
        $client = new Client([
            'host' => env('host'),
            'user' => env('user'),
            'pass' => env('pass')
        ]);
        
         $data = $client->query('/system/rebbot')->read();
        $sukses = 'berhasil reboot';
        
        return view('rebbot.index', compact('sukses'));
    }
}