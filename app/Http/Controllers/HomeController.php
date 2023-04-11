<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;

class HomeController extends Controller
{
    public function index() {
        # host ="202.154.12.251"
# user = "isp"
# pass = "P@ssw0rd"

$host ="103.158.155.7";
$user = "wahyu";
$pass = "wahyu2000";
        $client = new Client([
            'host' => $host,
            'user' =>  $user,
            'pass' => $pass
        ]);
        // dd($hostname.' - '.$user.' - '.$pass);
        $user = $client->query('ip/hotspot/user/print')->read();
        $aktif = $client->query('/ip/hotspot/active/print')->read();
        $resource = $client->query('/system/resource/print')->read();
        $totalUser = count($user);
        $totalAktif = count($aktif);

       
       return view('home', compact('totalUser', 'totalAktif', 'resource'));
    }
}
