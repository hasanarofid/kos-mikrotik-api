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
                <form role="form" method="POST" action="{{ '/filter/update' }}">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{ $detail[0]['.id'] }}">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="username">Nama</label>
                      <input type="text" class="form-control" id="comment" name="comment" value="{{ !empty($detail[0]['comment']) ? $detail[0]['comment'] :  ''}}" placeholder="Masukan name">
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Protocol</label>
                      <input type="text" class="form-control" id="protocol" name="protocol" value="{{ !empty($detail[0]['protocol']) ? $detail[0]['protocol'] :  ''}}" placeholder="protocol">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Port</label>
                      <input type="text" class="form-control" id="dstport" name="dstport" value="{{ !empty($detail[0]['dst-port']) ? $detail[0]['dst-port'] :  ''}}" placeholder="Port">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">DNS</label>
                      <input type="text" class="form-control" id="dns" name="dns" value="{{ !empty($detail[0]['tls-host']) ? $detail[0]['tls-host'] :  ''}}" placeholder="DNS">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Time</label>
                      <input type="text" class="form-control" id="time" name="time"value="{{ !empty($detail[0]['time']) ? $detail[0]['time'] :  ''}}"   placeholder="Time">
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