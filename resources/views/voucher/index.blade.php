@extends('layouts.master')

@section('title', 'Voucher')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Voucher</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/home' }}">Home</a></li>
              <li class="breadcrumb-item active">Voucher</li>
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
                          <h3 class="card-title">Data Voucher</h3><br>
                          <div class="row">
                            <div class="col-6">
                              {{-- <a href="{{ '/hotspot/ppoe/add' }}" class="btn btn-primary">Tambah Voucher</a> --}}
                            </div>
                       
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="container" style="max-width: 1500px">
                            <div class="row">
                          <?php
                            
                            foreach ( $data as $elements) :
                            // dd($elements);die;
                            ?>
                           

                          <div class="col-sm-2" style="padding-top: 10px;padding-left:5px;padding-right:5px;max-width: 100%;">
                            <h5 class="card-header bg-success d-flex justify-content-between align-items-center">
                              <?php echo !empty($elements['name']) ? $elements['name'] : '-' ?>
                              <br>
                             Limit :  <?php echo $elements['bytes-in'] ?> <br>
                             User :  <?php echo $elements['uptime'] ?> <br>
                              <button type="button" class="btn btn-sm btn-default"><i class="fa fa-plus"></i> </button>
                            
                              <!-- Wrap with <div>...buttons...</div> if you have multiple buttons -->
                            </h5>

                             
                          </div>
                      <?php endforeach; ?>
                      <div class="col-sm-2" style="padding-top: 10px;padding-left:5px;padding-right:5px;max-width: 100%;height:300px">
                      <h5 class="card-header  bg-success d-flex justify-content-center">
                    
                        <button type="button" class="btn btn-sm btn-default center-block" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> </button>
                      
                        <!-- Wrap with <div>...buttons...</div> if you have multiple buttons -->
                      </h5>
                    </div>
                    </div>
                  </div>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Voucher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{ '/save-voucher' }}">
          @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="username">Generate Voucher</label>
            <input type="text" name="voucher" class="from-control" id="voucher" placeholder="inputkan voucher" required>
          </div>
        
      
        </div>

        {{-- service, profile, dan remote address --}}
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>

     
      </div>
    </div>
  </div>
</div>