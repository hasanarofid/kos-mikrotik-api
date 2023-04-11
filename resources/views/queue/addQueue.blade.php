@extends('layouts.master')

@section('title', 'Tambah Queue')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Queue</h1>
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
                  <h3 class="card-title">Tambah Queue</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ '/hotspot/queue/store' }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="username">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Masukan name">
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Target</label>
                      <input type="text" class="form-control" id="target" name="target" placeholder="Target">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Max Limit Download</label>
                      <input type="text" class="form-control" id="ma" name="max" placeholder="Max Limit Download">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Max Limit Upload</label>
                      <input type="text" class="form-control" id="burst" name="burst" placeholder="Max Limit Upload">
                    </div>
                    
                  </div>

                  {{-- service, profile, dan remote address --}}
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