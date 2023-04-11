@extends('layouts.master')

@section('title', 'User Aktif')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Aktif</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/home' }}">Home</a></li>
              <li class="breadcrumb-item active">User Aktif</li>
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
                          <h3 class="card-title">Data User Aktif</h3><br>
                          <div class="row">
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Address</th>
                                <th>Mac Address</th>
                                <th>Uptime</th>
                                <th>Download</th>
                                <th>Upload</th>
                                <th>Kadalwarsa</th>
                            
                              </tr>
                            </thead>
                            @foreach ($aktif as $u)
                      
                            <tbody>
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td> {{ $u['name'] }}</td>
                                <td> {{ $u['address'] }}</td>
                                <td> {{ $u['caller-id'] }}</td>
                                <td> {{ $u['uptime'] }}</td>
                                <td> {{ $u['limit-bytes-in'] }}</td>
                                <td> {{ $u['limit-bytes-out'] }}</td>
                                <td>{{ $u['encoding'] }}</td>

                              </tr>
                            </tbody>
                            @endforeach
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