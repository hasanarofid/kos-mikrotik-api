@extends('layouts.master')

@section('title', 'Tambah User')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/home' }}">Home</a></li>
              <li class="breadcrumb-item active">Tambah User</li>
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
                  <h3 class="card-title">Tambah User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ '/hotspot/user/store' }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                    </div>

                    <div class="form-group">
                      <label for="username">Address Port</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Masukan address">
                    </div>

                    <div class="form-group">
                      <label for="username">Share User</label>
                      <input type="text" class="form-control" id="share" name="share" placeholder="Masukan share">
                    </div>

                    <div class="form-group">
                      <label for="username">Rate Limit</label>
                      <input type="text" class="form-control" id="rate" name="rate" placeholder="Masukan rate">
                    </div>


                    <div class="form-group">
                      <label for="username">Masa Berlaku</label>
                      <input type="text" class="form-control" id="masa" name="masa" placeholder="Masukan Masa berlaku">
                    </div>


                    
                    <div class="form-group">
                      <div class="form-group">
                        <label>User Profile</label>
                        <select class="form-control">
                          @foreach ($profile as $p)
                              <option>{{ $p['name'] }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
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