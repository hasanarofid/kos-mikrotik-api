@extends('layouts.master')

@section('title', 'Dashboard')
<style>
  #button-container {
  max-width: 800px;
  margin: 1em auto;
}

#pdf {
  border: 1px solid silver;
  border-radius: 3px;
  background: #a4edba;
  padding: 0.5em 1em;
}

#pdf i {
  margin-right: 1em;
}
</style>
@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    @php
                        // dd($resource);
                    @endphp
                    <h3>{{ 
                      
                      $resource[0]['board-name'] }}<sup style="font-size: 20px"></sup></h3>
    
                    <p>Resource</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-flash"></i>
                  </div>
                  {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
              </div>
              <!-- ./col -->
                 <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  @php
                      // dd($resource);
                  @endphp
                  <h3>{{ 
                    
                    $resource[0]['cpu-load'] }} % <sup style="font-size: 20px"></sup></h3>
  
                  <p>cpu load</p>
                </div>
                <div class="icon">
                  <i class="ion ion-flash"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                  <div class="inner">
                    @php
                        // dd($resource);
                    @endphp
                    <h3>{{ 
                      substr($resource[0]['free-memory'], 0, 3)
                      
 }} MB <sup style="font-size: 20px"></sup></h3>
    
                    <p>free memory</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-flash"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $totalAktif }}</h3>
  
                  <p>User Aktif</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="{{ '/user-aktif' }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
              <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $totalUser }}</h3>
  
                  <p>Total User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-stalker"></i>
                </div>
                <a href="{{ '/user-all' }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  @php
                      // dd($resource);
                  @endphp
                  <h3> <a href="{{ '/voucher' }}"> <i class="fa fa-plus"></i> <sup style="font-size: 20px"></sup> </a></h3>
  
                  <p>Tambah User</p>
                </div>
                <div class="icon">
                  <i class="fa fa-plus"></i>
                </div>
                <a href="{{ '/voucher' }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
           
            <!-- ./col -->
          </div>
        </div>
   
     
    
    @endsection
