<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;

class QueueController extends Controller
{
    public function index() {
     
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $data = $client->query('/queue/simple/print')->read();
    //    dd($data);
        // $user = collect($data)->except(['0'])->toArray(); 
        // $aktif = $client->query('/interface/pppoe-client/getall')->read();

        return view('queue.index', compact('data'));
        
    }

    public function add() {
   
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $profile = $client->query('/queue/simple/add')->read();
        // dd($profile);
        return view('queue.addQueue', compact('profile'));
    }

    public function store(Request $request) {
    
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $client->query([
        '/queue/simple/add',  
        '=name='.$request->name,
        '=target='.$request->target,
        '=max-limit='.$request->max,
        '=burst-limit='.$request->burst
        ])->read();
        return redirect('/queue');
    }

    public function edit($id){
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $query =
        (new Query('/queue/simple/print'))
            ->where('.id', $id);          
            $detail = $client->query($query)->read();
            return view('queue.edit', compact('detail'));
    }

    public function update(Request $request) {
      
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

                $query = (new Query('/queue/simple/set'))
                ->equal('.id', $request->id)
                ->equal('name', $request->name)
                ->equal('target', $request->target)
                ->equal('max-limit', $request->max)
                ->equal('burst-limit', $request->burst);
                // '=name='.$request->name,
                // '=target='.$request->target,
                // '=max-limit='.$request->max,
                // '=burst-limit='.$request->burst
                $client->query($query)->read();
        return redirect('/queue');
    }



    public function destroy($id){
    
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $client->query(['/queue/simple/remove', '=.id='.$id])->read();

        return redirect('/queue');
    }

    public function enable($id) {
      
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $client->query(['/queue/simple/enable', '=.id='.$id])->read();
     
        return redirect('/queue');
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

        $client->query(['/queue/simple/disable', '=.id='.$id])->read();
     
        return redirect('/queue');
      
    }
}