@extends('layouts.master')

@section('title', 'List User')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/home' }}">Home</a></li>
              <li class="breadcrumb-item active">List User</li>
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
                          <h3 class="card-title">Data User</h3><br>
                          <div class="row">
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped" id="table">
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
                            <tbody>
                     
                            @foreach ($user as $u)
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td> {{ $u['name'] }}</td>
                                <td> {{ !empty($u['address']) ? $u['address'] : '-'  }}</td>
                                <td> {{ !empty($u['mac-address']) ? $u['mac-address'] : '-'  }}</td>
                                <td> {{ !empty($u['bytes-in']) ? $u['bytes-in'] : '-'  }}</td>
                                <td> {{ !empty($u['bytes-out']) ? $u['bytes-out'] : '-'  }}</td>
                                <td> {{ !empty($u['uptime']) ? $u['uptime'] : '-' }}</td>
                                <td>{{ !empty($u['comment']) ? $u['comment'] : '-' }}</td>

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