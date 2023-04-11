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
        // dd($hostname.' - '.$user.' - '.$pass);
        $user = $client->query('/ppp/secret/print')->read();
        $aktif = $client->query('/ppp/active/print')->read();
        $resource = $client->query('/system/resource/print')->read();
        $totalUser = count($user);
        $totalAktif = count($aktif);



       return view('home', compact('totalUser', 'totalAktif', 'resource'));
    }
}
