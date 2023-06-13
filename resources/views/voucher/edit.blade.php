@extends('layouts.master')

@section('title', 'Edit Voucher')

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
                  <h3 class="card-title">Edit Voucher</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @php
                    // dd($detail);
                @endphp
                <form role="form" method="POST" action="{{ '/update-voucher' }}">
                    @csrf
                    <input type="hidden" name="id" id="id_profile">
                    <input type="hidden" name="profile" id="profile">
          
                  <div class="card-body">
                    <div class="form-group">
                      <label for="username">Generate Voucher</label>
                      <input type="text" class="form-control" name="name" value="{{ $data[0]['name'] }}" class="from-control" id="name2" placeholder="inputkan voucher" >
                    </div>
                    <div class="form-group">
                      <label for="username">Limit</label>
                      <input type="text" class="form-control" name="rate" value="{{ !empty($data[0]['rate-limit']) ? $data[0]['rate-limit'] : '' }}" class="from-control" id="rate-limit2" placeholder="limit voucher" >
                    </div>
                    <hr>
                    <h3> Tambah user</h3>
                    <div class="form-group">
                      <label for="username">User</label>
                      <input type="text" class="form-control" name="user" id="user"  class="from-control"  placeholder="inputkan User" >
                    </div>
          
                    <div class="form-group">
                      <label for="username">Address</label>
                      <input type="text" class="form-control" name="address" id="address"  class="from-control" placeholder="inputkan Address" >
                    </div>
          
                    <div class="form-group">
                      <label for="username">Rate Limit</label>
                      <input type="text" class="form-control" name="ratelimit" id="ratelimit"  class="from-control"  placeholder="inputkan Rate Limit" >
                    </div>
          
                    <div class="form-group">
                      <label for="username">Fup</label>
                      <input type="text" class="form-control" name="fup" id="fup"  class="from-control"  placeholder="inputkan Fup" >
                    </div>
          
                    <div class="form-group">
                      <label for="username">Kadalwarsa</label>
                      <input type="text" class="form-control" name="kadalwarsa" id="kadalwarsa"  class="from-control"  placeholder="inputkan Kadalwarsa" >
                    </div>
                
                  </div>
                  <hr>
                  <a href="#" onclick="tambahUser()" class="btn btn-sm btn-success" > <i class="fa fa-plus"></i> </a>
                  <hr>
          
                  <table class="table table-striped" id="list-user-dialgi">
                    <thead>
                      <tr>
                        <th>No</th>
                                          <th>User</th>
                                          <th>Address</th>
                                          <th>Rate Limit</th>
                                          <th>Fup</th>
                                        
                                          <th>Kadalwarsa</th>
                                          <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="list-user">
                      @php
                      $no = 1;
                  @endphp

                    @forelse($user as $u)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td> {{ $u['name'] }}</td>
                            <td> {{ !empty($u['address']) ? $u['address'] : '-'  }}</td>
                            <td> {{ !empty($u['rate-limit']) ? $u['rate-limit'] : '-'  }}</td>
                            <td> - </td>
                            <td>{{ !empty($u['comment']) ? $u['comment'] : '-' }}</td>
                            <td>
                                <a href="{{ '/hotspot/user/edit/' }}{{ $u['.id'] }}" class="btn btn-success">Edit</a>
                                <a href="{{ '/hotspot/user/remove/' }}{{ $u['.id'] }}/{{ $data[0]['name'] }}/{{ $data[0]['.id'] }}" class="btn btn-danger">Hapus</a>
                                @if($u['disabled'] == 'true')
                                <a href="{{ '/hotspot/user/enable/' }}{{ $u['.id'] }}/{{ $data[0]['name'] }}/{{ $data[0]['.id'] }}" class="btn btn-info">enable</a>
                                @else 
                                <a href="{{ '/hotspot/user/disable/' }}{{ $u['.id'] }}/{{ $data[0]['name'] }}/{{ $data[0]['.id'] }}" class="btn btn-warning">disable</a>
                                @endif
                               
                            </td>
                        </tr>
                    
                    @empty
                       <tr>
                        <td colspan="7">Tidak Ada data</td>
                       </tr>
                    @endforelse
                        
                    </tbody>
                  </table>
               
                  <div class="card-footer" id="footer-edit">
                    <button type="submit" class="btn btn-primary">Save</button>
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


@push('js-page')

<script>

function tambahUser(){
    var user =  $("#user").val();
    var address =  $("#address").val();
    var ratelimit =  $("#ratelimit").val();
    var fup =  $("#fup").val();
    var kadalwarsa =  $("#kadalwarsa").val();
    var rowCount = parseInt($('#list-user tr').length) + 1;
   var tr = '';
    tr += "<tr>";
                       tr += "<td>"+rowCount+"</td>";
                       tr += "<td>"+user+" <input type='hidden' name='users[]' value='"+user+"' ></td>";
                       tr += "<td>"+address+" <input type='hidden' name='address2[]' value='"+address+"' ></td>";
   
                       tr += "<td>"+ratelimit+" <input type='hidden' name='ratelimits[]' value='"+ratelimit+"' ></td>";
                       tr += "<td>"+fup+" <input type='hidden' name='fups[]' value='"+fup+"' ></td>";
                       tr += "<td>"+kadalwarsa+" <input type='hidden' name='kadalwarsas[]' value='"+kadalwarsa+"' ></td>";
   
                       tr +=  "</tr>";
   
               console.log(tr);
                   $("#list-user").append(tr);
   
                    $("#user").val('');
    $("#address").val('');
     $("#ratelimit").val('');
     $("#fup").val('');
    $("#kadalwarsa").val('');
   
   }


</script>


@endpush