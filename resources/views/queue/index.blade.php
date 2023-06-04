@extends('layouts.master')

@section('title', 'Queue')

@section('content')
<div class="container">
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
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Data Queue</h3><br>
                          <div class="row">
                            <div class="col-6">
                              <a href="{{ '/hotspot/queue/add' }}" class="btn btn-primary">Tambah Queue</a>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped" id="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>name</th>
                                <th>target</th>
                                <th>Max Limit Download</th>
                                <th>Max Limit Upload</th>
                                {{-- <th>Status</th> --}}
                                <th>Aksi</th>
                              </tr>
                            </thead> <tbody>
                                @php
                                    $no=1;   
                                @endphp
                            @foreach ($data as $u)
                            @php
                                // dd($u); 
                            @endphp
                                <tr>
                                    <td>{{ $no++}}</td>
                                    <td>{{ $u['name']}}</td>
                                    <td>{{ !empty($u['target']) ? $u['target'] : '-' }}</td>
                                    <td>{{ $u['max-limit']}}</td>
                                    <td>{{ $u['burst-limit']}}</td>
                                    {{-- <td>{{ ($u['disabled'] == 'true')  ? 'Disable' : 'Enable' }}</td> --}}
                                    <td>
                                      <a href="{{ '/hotspot/queue/edit/' }}{{ $u['.id'] }}" class="btn btn-success">Edit</a>
                                      <a href="{{ '/hotspot/queue/remove/' }}{{ $u['.id'] }}" class="btn btn-danger">Hapus</a>
                                      @if($u['disabled'] == 'true')
                                      <a href="{{ '/hotspot/queue/enable/' }}{{ $u['.id'] }}" class="btn btn-info">enable</a>
                                      @else 
                                      <a href="{{ '/hotspot/queue/disable/' }}{{ $u['.id'] }}" class="btn btn-warning">disable</a>
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