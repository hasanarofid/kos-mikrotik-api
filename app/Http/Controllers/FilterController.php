<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;

class FilterController extends Controller
{
    public function index() {
     
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $data = $client->query('/ip/firewall/raw/getall')->read();
    //    dd($data);
        // $user = collect($data)->except(['0'])->toArray(); 
        // $aktif = $client->query('/interface/pppoe-client/getall')->read();

        return view('filter.index', compact('data'));
        
    }

    public function add() {
   
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $profile = $client->query('/ip/firewall/raw/add')->read();
        // dd($profile);
        return view('filter.addfilter', compact('profile'));
    }

    public function store(Request $request) {
    
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        
// dd($request->dns);
     $save =    $client->query([
        '/ip/firewall/raw/add',  
        '=chain='.'prerouting',
        '=action='.'drop',
        '=comment='.$request->comment,
        '=protocol='.$request->protocol,
        '=dst-port='.$request->dstport,
        '=tls-host='.'*.'.$request->dns,
        '=time='.$request->time
        ])->read();
        // dd($save);die;
        return redirect('/filter');
    }

    public function edit($id){
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $query =
        (new Query('/ip/firewall/raw/print'))
            ->where('.id', $id);          

            $detail = $client->query($query)->read();
            // dd($detail);    
            return view('filter.edit', compact('detail'));
    }

    public function update(Request $request) {
      
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        
        // '=chain='.'prerouting',
        // '=action='.'drop',
        // '=comment='.$request->comment,
        // '=protocol='.$request->protocol,
        // '=dst-port='.$request->dstport,
        // '=tls-host='.'*.'.$request->dns,
        // '=time='.$request->time

                $query = (new Query('/ip/firewall/raw/set'))
                ->equal('.id', $request->id)
                ->equal('chain', 'chain')
                ->equal('action', 'drop')
                ->equal('comment', $request->comment)
                ->equal('protocol', $request->protocol)
                ->equal('dst-port', $request->dstport)
                ->equal('tls-host', $request->dns)
                ->equal('time', $request->time);
                $client->query($query)->read();
        return redirect('/filter');
    }



    public function destroy($id){
    
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $client->query(['/ip/firewall/raw/remove', '=.id='.$id])->read();

        return redirect('/filter');
    }

    public function enable($id) {
      
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);        

        $client->query(['/ip/firewall/raw/enable', '=.id='.$id])->read();
     
        return redirect('/filter');
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

        $client->query(['/ip/firewall/raw/disable', '=.id='.$id])->read();
     
        return redirect('/filter');
      
    }
}