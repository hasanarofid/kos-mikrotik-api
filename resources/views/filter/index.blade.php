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
                                <th>Nama Filter</th>
                                <th>Address</th>
                                <th>Tanggal</th>
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
                                    <td>{{ $u['list']}}</td>
                                    <td>{{ !empty($u['address']) ? $u['address'] : '-' }}</td>
                                    <td>{{ $u['creation-time']}}</td>
                                    {{-- <td>{{ ($u['disabled'] == 'true')  ? 'Disable' : 'Enable' }}</td> --}}
                                    <td>
                                      <a href="{{ '/filter/edit/' }}{{ $u['.id'] }}" class="btn btn-success">Edit</a>
                                      <a href="{{ '/filter/remove/' }}{{ $u['.id'] }}" class="btn btn-danger">Hapus</a>
                                      @if($u['disabled'] == 'true')
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