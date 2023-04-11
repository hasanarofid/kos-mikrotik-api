<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;

class VoucherController extends Controller
{


    public function index() {
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        
        $data = $client->query('/ip/hotspot/user/print')->read();
        $user = collect($data)->except(['0'])->toArray(); 
        $aktif = $client->query('/ip/hotspot/active/print')->read();
        // dd($data);die;
        return view('voucher.index', compact('user', 'aktif','data'));
        
    }

    public function add() {
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        $profile = $client->query('/ppp/secret/add')->read();
        // dd($profile);
        return view('voucher.addUser', compact('profile'));
    }

    public function edit($id){
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        $query =
        (new Query('/ppp/secret/print'))
            ->where('.id', $id);          
            $detail = $client->query($query)->read();
            return view('voucher.edit', compact('detail'));
    }

    public function update(Request $request) {
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
                ]);
                $query = (new Query('/ppp/secret/set'))
                ->equal('.id', $request->id)
                ->equal('name', $request->username)
                ->equal('password', $request->password)
                ->equal('service', $request->service)
                ->equal('profile', $request->profile)
                ->equal('remote-address', $request->remote_address);
        
                $client->query($query)->read();
        return redirect('/voucher');
    }

    public function store(Request $request) {
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
                ]);
// dd($request);
        $client->query([
        '/ppp/secret/add',  
        '=name='.$request->username,
        '=password='.$request->password,
        '=service='.$request->service,
        '=profile='.$request->profile,
        '=remote-address='.$request->remote_address
        ])->read();
       
        return redirect('/voucher');
    }



    public function quick() {
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);

        for($i = 0; $i <= 200; $i++) {
            $password = Str::random(5);
            $username = Str::random(2) . "-lugaru";
            $client->query(['/ip/hotspot/user/add',  '=name='.$username, '=password='.$password])->read();
        }

        return redirect('/voucher');
    }

    public function destroy($id){
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        $client->query(['/ppp/secret/remove', '=.id='.$id])->read();

        return redirect('/voucher');
    }

    public function enable($id) {
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        $client->query(['/ppp/secret/enable', '=.id='.$id])->read();
     
        return redirect('/voucher');
    }

    /**
     * This method is used to disable hotspot by id
     * @param type $id string
     * @return type array
     * 
     */
    public function disable($id) {
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        $client->query(['/ppp/secret/disable', '=.id='.$id])->read();
     
        return redirect('/voucher');
      
    }
}


