<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;

class HomeController extends Controller
{
    public function index() {
            $client = new Client([
                'host' => env("host"),
                'user' =>  env("user"),
                'pass' => env("pass")
            ]);


            $user = $client->query('/ip/hotspot/user/print')->read();
            $aktif = $client->query('/ip/hotspot/active/print')->read();

        // $user = $client->query('ip/hotspot/user/print')->read();
        // $aktif = $client->query('/ip/hotspot/active/print')->read();
        $resource = $client->query('/system/resource/print')->read();
        // dd($user);           
        $totalUser = count($user);
        $totalAktif = count($aktif);

       
       return view('home', compact('totalUser', 'totalAktif', 'resource'));
    }
}
