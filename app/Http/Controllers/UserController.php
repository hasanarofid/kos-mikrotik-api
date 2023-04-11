<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;

class UserController extends Controller
{


    public function index() {
        $client = new Client([
            'host' => env('host'),
            'user' => env('user'),
            'pass' => env('pass')
        ]);
        
        $data = $client->query('/ip/hotspot/user/print')->read();
        $user = collect($data)->except(['0'])->toArray(); 
        $aktif = $client->query('/ip/hotspot/active/print')->read();

        return view('user', compact('user', 'aktif'));
        
    }

    public function add() {
        $client = new Client([
            'host' => env('host'),
            'user' => env('user'),
            'pass' => env('pass')
        ]);
        $profile = $client->query('/ip/hotspot/user/profile/print')->read();
        // dd($profle);
        return view('addUser', compact('profile'));
    }

    public function store(Request $request) {
        $client = new Client([
            'host' => env('host'),
            'user' => env('user'),
            'pass' => env('pass')
                ]);
// dd($request->$password);die;
        $client->query([
            '/ppp/secret/add',  
            '=name='.$request->username,
            '=address='.$request->address,
            '=caller-id='.$request->share,
            '=uptime='.$request->rate,
            '=encoding='.$request->masa
        ])->read();
       
        return redirect('/home');
    }

    public function quick() {
        $client = new Client([
            'host' => env('host'),
            'user' => env('user'),
            'pass' => env('pass')
        ]);

        for($i = 0; $i <= 200; $i++) {
            $password = Str::random(5);
            $username = Str::random(2) . "-hasan";
            $client->query(['/ip/hotspot/user/add',  '=name='.$username, '=password='.$password])->read();
        }

        return redirect('/user');
    }

    public function destroy($id){
        $client = new Client([
            'host' => env('host'),
            'user' => env('user'),
            'pass' => env('pass')
        ]);
        $client->query(['/ip/hotspot/user/remove', '=.id='.$id])->read();

        return redirect('/user');
    }

    public function enable($id) {
        $client = new Client([
            'host' => env('host'),
            'user' => env('user'),
            'pass' => env('pass')
        ]);
        $client->query(['/ip/hotspot/user/enable', '=.id='.$id])->read();
     
        return redirect('/user');
    }

    /**
     * This method is used to disable hotspot by id
     * @param type $id string
     * @return type array
     * 
     */
    public function disable($id) {
        $client = new Client([
            'host' => env('host'),
            'user' => env('user'),
            'pass' => env('pass')
        ]);
        $client->query(['/ip/hotspot/user/disable', '=.id='.$id])->read();
     
        return redirect('/user');
      
    }

    public function useraktif() {
        $client = new Client([
            'host' => env('host'),
            'user' => env('user'),
            'pass' => env('pass')
        ]);
        $user = $client->query('/ppp/secret/print')->read();
        $aktif = $client->query('/ppp/active/print')->read();
       
        return view('user.aktif', compact('user', 'aktif'));
    
      
    }

    public function userall() {
        $client = new Client([
            'host' => env('host'),
            'user' => env('user'),
            'pass' => env('pass')
        ]);
        $user = $client->query('/ppp/secret/print')->read();
        $aktif = $client->query('/ppp/active/print')->read();
       
        return view('user.userall', compact('user', 'aktif'));
    
      
    }
}


