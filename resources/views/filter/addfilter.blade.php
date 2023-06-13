@extends('layouts.master')

@section('title', 'Tambah Filter')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Filter</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/home' }}">Home</a></li>
              <li class="breadcrumb-item active">Tambah Filter</li>
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
                  <h3 class="card-title">Tambah Filter</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ '/filter/store' }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="username">Nama</label>
                      <input type="text" class="form-control" id="comment" name="comment" placeholder="Masukan name">
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Protocol</label>
                      <input type="text" class="form-control" id="protocol" name="protocol" placeholder="protocol">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Port</label>
                      <input type="text" class="form-control" id="dstport" name="dstport" placeholder="Port">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">DNS</label>
                      <input type="text" class="form-control" id="dns" name="dns" placeholder="DNS">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Time</label>
                      <input type="text" class="form-control" id="time" name="time" placeholder="Time">
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