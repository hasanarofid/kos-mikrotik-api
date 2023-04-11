<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;

class UserController extends Controller
{


    public function index() {
        $host ="103.158.155.7";
        $user = "wahyu";
        $pass = "wahyu2000";
                $client = new Client([
                    'host' => $host,
                    'user' =>  $user,
                    'pass' => $pass
                ]);
        
        $data = $client->query('/ip/hotspot/user/print')->read();
        $user = collect($data)->except(['0'])->toArray(); 
        $aktif = $client->query('/ip/hotspot/active/print')->read();

        return view('user', compact('user', 'aktif'));
        
    }

    public function add() {
        $host ="103.158.155.7";
        $user = "wahyu";
        $pass = "wahyu2000";
                $client = new Client([
                    'host' => $host,
                    'user' =>  $user,
                    'pass' => $pass
                ]);
        $profile = $client->query('/ip/hotspot/user/profile/print')->read();
        // dd($profle);
        return view('addUser', compact('profile'));
    }

    public function store(Request $request) {
        $host ="103.158.155.7";
        $user = "wahyu";
        $pass = "wahyu2000";
                $client = new Client([
                    'host' => $host,
                    'user' =>  $user,
                    'pass' => $pass
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
        $host ="103.158.155.7";
        $user = "wahyu";
        $pass = "wahyu2000";
                $client = new Client([
                    'host' => $host,
                    'user' =>  $user,
                    'pass' => $pass
                ]);

        for($i = 0; $i <= 200; $i++) {
            $password = Str::random(5);
            $username = Str::random(2) . "-hasan";
            $client->query(['/ip/hotspot/user/add',  '=name='.$username, '=password='.$password])->read();
        }

        return redirect('/user');
    }

    public function destroy($id){
        $host ="103.158.155.7";
        $user = "wahyu";
        $pass = "wahyu2000";
                $client = new Client([
                    'host' => $host,
                    'user' =>  $user,
                    'pass' => $pass
                ]);
        $client->query(['/ip/hotspot/user/remove', '=.id='.$id])->read();

        return redirect('/user');
    }

    public function enable($id) {
        $host ="103.158.155.7";
        $user = "wahyu";
        $pass = "wahyu2000";
                $client = new Client([
                    'host' => $host,
                    'user' =>  $user,
                    'pass' => $pass
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
        $host ="103.158.155.7";
        $user = "wahyu";
        $pass = "wahyu2000";
                $client = new Client([
                    'host' => $host,
                    'user' =>  $user,
                    'pass' => $pass
                ]);
        $client->query(['/ip/hotspot/user/disable', '=.id='.$id])->read();
     
        return redirect('/user');
      
    }

    public function useraktif() {
        $host ="103.158.155.7";
        $user = "wahyu";
        $pass = "wahyu2000";
                $client = new Client([
                    'host' => $host,
                    'user' =>  $user,
                    'pass' => $pass
                ]);
                $user = $client->query('/ip/hotspot/user/print')->read();
        $aktif = $client->query('/ip/hotspot/active/print')->read();
       
        return view('user.aktif', compact('user', 'aktif'));
    
      
    }

    public function userall() {
        $host ="103.158.155.7";
        $user = "wahyu";
        $pass = "wahyu2000";
                $client = new Client([
                    'host' => $host,
                    'user' =>  $user,
                    'pass' => $pass
                ]);
        $user = $client->query('/ip/hotspot/user/print')->read();
        $aktif = $client->query('/ip/hotspot/active/print')->read();
       
        return view('user.userall', compact('user', 'aktif'));
    
      
    }
}


