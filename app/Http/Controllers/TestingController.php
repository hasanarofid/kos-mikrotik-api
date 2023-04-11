<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\config\Mikrotik;
use Config;
use RouterOS\Client;
use RouterOS\Query;
class TestingController extends Controller
{
    public function index() {
        // Initiate client with config object
        $client = new Client([
          'host' => config('services.mikrotik.host'),
          'user' => config('services.mikrotik.user'),
          'pass' => config('services.mikrotik.pass'),
        ]);    
    
        // Create "where" Query object for RouterOS
        $query =
          (new Query('/interface/wireless/registration-table/print'));
    
        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        // testing.blade.php
        return view('testing', compact('response'));
    // }
        // return dd ( $response);
      }
}
