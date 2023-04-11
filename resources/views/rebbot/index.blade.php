@extends('layouts.master')

@section('title', 'Rebbot')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reboot</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Reboot</li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
     
        <div class="row">
          @if (!empty($sukses))
          <div class="col-md-12 alert alert-success alert-dismissible fade show"  >
              <strong>Success!</strong> Berhasil Reboot.
          </div>
              
          @endif

            <div class="col-md-12">
                <!-- Line chart -->
                <div class="card card-primary card-outline">
                  <a class="btn btn-lg btn-warning text-white" href="{{ url('rebbotproses') }}"> <i class="fa fa-power"></i>   Rebbot </a>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
    
@endsection