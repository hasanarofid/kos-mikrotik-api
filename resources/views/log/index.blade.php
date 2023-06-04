@extends('layouts.master')

@section('title', 'Log')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Log</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/home' }}">Home</a></li>
              <li class="breadcrumb-item active">Log</li>
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
                          <h3 class="card-title">Data Log</h3><br>
                          <div class="row">
                            <div class="col-6">
                              {{-- <a href="{{ '/hotspot/ppoe/add' }}" class="btn btn-primary">Tambah PPOE</a> --}}
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
                          <table class="table table-striped" id="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>User(IP)</th>
                                
                                <th>Keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
                             

                            @foreach ($data as $key=>$u)
                         
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                           
                                <td> {{ $u['time']}}</td>
                                <td>{{ $u['topics'] }}</td>
                                <td>{{ $u['message'] }}</td>
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
@push('js-page')


<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>


<script>
  $(document).ready(function() {
    $('#table').DataTable(
      {
        "lengthMenu": [10,20, 40, 60, 80, 100],
        "pageLength": 10
      }
    );
} );
</script>


@endpush