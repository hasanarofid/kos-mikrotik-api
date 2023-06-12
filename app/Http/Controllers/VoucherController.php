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

        
        $data = $client->query('/ip/hotspot/user/profile/print')->read();
        // dd($data);
        $user = collect($data)->except(['0'])->toArray(); 
        $aktif = $client->query('/ip/hotspot/active/print')->read();
        // dd($user);die;
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

    public function edit($name,$id){
        // dd($id);
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);

        $query2 =
        (new Query('/ip/hotspot/user/profile/print'))
            ->where('.id', $id);
    
    // Send query and read response from RouterOS
    $data = $client->query($query2)->read();

        // dd($data[0]['name']);
        $query =
    (new Query('/ip/hotspot/user/print'))
        ->where('profile', $name);

// Send query and read response from RouterOS
$user = $client->query($query)->read();

            return view('voucher.edit', compact('data','user'));
    }

    public function useredit($id){
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        $query2 =
        (new Query('/ip/hotspot/user/profile/print'))
            ->where('.id', $id);

    $user = $client->query($query2)->read();

// dd($user);
            return view('voucher.useredit', compact('user'));
    }

    public function updateuser(Request $request){
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        $query = (new Query('/ip/hotspot/user/profile/set'))
        ->equal('.id',$request->id)
        ->equal('name', $request->user)
        ->equal('address', $request->address)

        ->equal('rate-limit',$request->ratelimit);
        $update =   $client->query($query)->read();

        return redirect('/voucher');
    }

    // public function update(Request $request) {
    //     $client = new Client([
    //         'host' => env("host"),
    //         'user' =>  env("user"),
    //         'pass' => env("pass")
    //     ]);

    //             $query = (new Query('/ppp/secret/set'))
    //             ->equal('.id', $request->id)
    //             ->equal('name', $request->username)
    //             ->equal('password', $request->password)
    //             ->equal('service', $request->service)
    //             ->equal('profile', $request->profile)
    //             ->equal('remote-address', $request->remote_address);
        
    //             $client->query($query)->read();
    //     return redirect('/voucher');
    // }

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

    public function save(Request $request){
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);

      
      
        $client->query([
            '/ip/hotspot/user/profile/add',  
            '=name='.$request->name,
            '=rate-limit='.$request->rate
        ])->read();
        return redirect('/voucher');
    }

    public function daftarvoucher(Request $request){
        $name = $request->name;
        $id = $request->id;

        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        $query2 =
        (new Query('/ip/hotspot/user/profile/print'))
            ->where('.id', $id);
    
    // Send query and read response from RouterOS
    $data = $client->query($query2)->read();

        // dd($data[0]['name']);
        $query =
    (new Query('/ip/hotspot/user/print'))
        ->where('profile', $name);

// Send query and read response from RouterOS
$user = $client->query($query)->read();
// dd($user);
    $result = array();
        $result['name'] = $name;
        $result['id'] = $id;
        $result['voucher'] = $data[0]['name'];
        $result['rate'] = !empty($data[0]['rate-limit']) ? $data[0]['rate-limit'] : '';
        $result['total'] = !empty($user) ? count($user) : 0;

        
        $result['user'] = $user;

    return json_encode($result);

    }

    public function showvoucher(Request $request){
        $name = $request->name;
        $id = $request->id;

        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        $query2 =
        (new Query('/ip/hotspot/user/profile/print'))
            ->where('.id', $id);
    
    // Send query and read response from RouterOS
    $data = $client->query($query2)->read();

        // dd($data[0]['name']);
        $query =
    (new Query('/ip/hotspot/user/print'))
        ->where('profile', $name);

// Send query and read response from RouterOS
$user = $client->query($query)->read();
// dd($user);
    $result = array();
    $result['name'] = $name;
    $result['id'] = $id;
        $result['voucher'] = $data[0]['name'];
        $result['rate'] = !empty($data[0]['rate-limit']) ? $data[0]['rate-limit'] : '';
        $result['total'] = !empty($user) ? count($user) : 0;

        
        $result['user'] = $user;

    return json_encode($result);
    }

    public function update(Request $request){
        // dd($request->all());
        $client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);
        if(is_array($request->users)){
            foreach($request->users as $key=>$value){
                // dd($request->ratelimits[$key]);
                $client->query([
                    '/ip/hotspot/user/add',  
                    '=name='.$value,
                    '=address='.$request->address2[$key],
                    '=comment='.$request->kadalwarsas[$key],
                    '=profile='.$request->name
                ])->read();
                $client->query([
                    '/queue/simple/add',  
                    '=name='.$value,
                    '=target='.$request->address2[$key],
                    '=max-limit='.$request->ratelimits[$key]
                    ])->read();
            
            }
            
        }else{
            $client->query([
                '/ip/hotspot/user/add',  
                '=name='.$request->users,
                '=address='.$request->address2,
                '=comment='.$request->kadalwarsas,
                '=profile='.$request->name
            ])->read();
            $client->query([
                '/queue/simple/add',  
                '=name='.$request->users,
                '=target='.$request->address2,
                '=max-limit='.$request->ratelimits
                ])->read();
        }

       
                    $query = (new Query('/ip/hotspot/user/profile/set'))
                    ->equal('.id',$request->id)
                    ->equal('name', $request->name)
                    ->equal('rate-limit',$request->rate);
                    $update =   $client->query($query)->read();
                // dd($update);
        return redirect('/voucher');
    }
}


