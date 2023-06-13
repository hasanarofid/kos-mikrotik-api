@extends('layouts.master')

@section('title', 'Filter')

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
              <li class="breadcrumb-item active">Filter</li>
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
                          <h3 class="card-title">Data Filter</h3><br>
                          <div class="row">
                            <div class="col-6">
                              <a href="{{ '/filter/add' }}" class="btn btn-primary">Tambah Filter</a>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped" id="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama </th>
                                <th>Protokol</th>
                                <th>Port</th>
                                <th>DNS</th>
                                <th>Time</th>
                                <th>Aksi</th>
                              </tr>
                            </thead> <tbody>
                                @php
                                    $no=1;   
                                @endphp
                                @php
                                // dd($data); 
                            @endphp
                            @foreach ($data as $u)
                            
                                <tr>
                                    <td>{{ $no++}}</td>
                                    <td>{{ !empty($u['comment']) ? $u['comment'] : '-' }}</td>
                                    <td>{{ !empty($u['protocol']) ? $u['protocol'] : '-' }}</td>
                                    <td>{{ !empty($u['dst-port']) ? $u['dst-port'] : '-' }}</td>
                                    <td>{{ !empty($u['tls-host']) ? $u['tls-host'] : '-' }}</td>
                                    <td>{{ !empty($u['time']) ? $u['time'] : '-' }}</td>
                                    <td>
                                      <a href="{{ '/filter/edit/' }}{{ $u['.id'] }}" class="btn btn-success">Edit</a>
                                      <a href="{{ '/filter/remove/' }}{{ $u['.id'] }}" class="btn btn-danger">Hapus</a>
                                      @if(!empty($u['disabled']) && $u['disabled'] == 'true')
                                      <a href="{{ '/filter/enable/' }}{{ $u['.id'] }}" class="btn btn-info">enable</a>
                                      @else 
                                      <a href="{{ '/filter/disable/' }}{{ $u['.id'] }}" class="btn btn-warning">disable</a>
                                      @endif
                                  </td>
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