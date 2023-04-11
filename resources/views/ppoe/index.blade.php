@extends('layouts.master')

@section('title', 'PPOE CLIENT')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">PPOE CLIENT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/home' }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Data PPOE CLIENT</h3><br>
                          <div class="row">
                            <div class="col-6">
                              <a href="{{ '/hotspot/ppoe/add' }}" class="btn btn-primary">Tambah PPOE</a>
                            </div>
                            {{-- <div class="col-6">
                              <form action="{{ '/hotspot/ppoe/quick' }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Tambah User Cepat</button>
                              </form>  
                            </div> --}}
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Password</th>
                                
                                <th>Service</th>
                                <th>Profile</th>
                                <th>Remote Address</th>
                                {{-- <th>Status</th> --}}
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php
                              use App\Models\User;



                              @endphp
                            @foreach ($data as $key=>$u)
                            @php
                             $id = $u['.id'];
  $service = '';
  foreach ($aktif as $index => $pppInterface) {
    if ($pppInterface['name'] === $u['name']) {
      $service = $pppInterface['service'];
      break;
    }
 }
                                // dd($aktif[0]['.id']);die;
                                
                            @endphp
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                  @if($u['disabled'] == 'true')
                                  <p style="background-color: blueviolet;color:white" > (disable) Username : {{ $u['name'] }}</p>
                                  @else 
                                 
                                 
                                  @endif
                                  @if (!empty($service) )
                                  <p style="background-color: green;color:white" > (Aktif) Username : {{$u['name'] }}</p>
                                 
                                  @endif
                                  Username : {{ $u['name'] }}
                                </td>
                                <td>Password : {{ $u['password'] }}</td>
                                <td>{{ $u['service'] }}</td>
                                <td>{{ $u['profile'] }}</td>
                                <td> {{ !empty($u['remote-address']) ? $u['remote-address'] : '-'}}</td>
                                {{-- <td>{{ $u['password'] }}</td> --}}
                                {{-- <td>{{ ($u['disabled'] == 'true')  ? 'Disable' : 'Enable' }}</td> --}}
                                <td>
                                  <a href="{{ '/hotspot/ppoe/edit/' }}{{ $u['.id'] }}" class="btn btn-success">Edit</a>
                                    <a href="{{ '/hotspot/ppoe/remove/' }}{{ $u['.id'] }}" class="btn btn-danger">Hapus</a>
                                    @if($u['disabled'] == 'true')
                                    <a href="{{ '/hotspot/ppoe/enable/' }}{{ $u['.id'] }}" class="btn btn-info">enable</a>
                                    @else 
                                    <a href="{{ '/hotspot/ppoe/disable/' }}{{ $u['.id'] }}" class="btn btn-warning">disable</a>
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                        </tbody>

                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

</div>
    
@endsection