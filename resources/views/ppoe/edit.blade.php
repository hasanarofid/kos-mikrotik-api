@extends('layouts.master')

@section('title', 'Edit PPOE CLIENT')

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
                    <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit PPOE CLIENT</h3>
                </div>
                <form role="form" method="POST" action="{{ '/hotspot/ppoe/update' }}">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{ $detail[0]['.id'] }}">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" value="{{ $detail[0]['name'] }}" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" value="{{ $detail[0]['password'] }}" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Service</label>
                      <input type="text" class="form-control" value="{{ $detail[0]['service'] }}" id="service" name="service" placeholder="Service">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Profile</label>
                      <input type="text" class="form-control" value="{{ $detail[0]['profile'] }}" id="profile" name="profile" placeholder="Profile">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Remote Address</label>
                      <input type="text" class="form-control" value="{{ $detail[0]['remote-address'] }}" id="remote_address" name="remote_address" placeholder="Remote Address">
                    </div>
                    
                  </div>

                  {{-- service, profile, dan remote address --}}
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
    
@endsection