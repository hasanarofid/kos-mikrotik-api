@extends('layouts.master')

@section('title', 'Voucher')

@section('content')
@php
    use \RouterOS\Client;
use \RouterOS\Query;
$client = new Client([
            'host' => env("host"),
            'user' =>  env("user"),
            'pass' => env("pass")
        ]);  

@endphp
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
                            // dd($user);                   
                            foreach ( $user as $elements) :
                            // dd($elements);die;
                          //  $user  $client->query(['/ip/hotspot/user/set', '=profile='. $elements['name']])->read();
//                             $query =
// (new Query('/ip/hotspot/user/profile/set'))
// ->equal("profile", "=",$elements['name']);
    // ->equal('profile', $elements['name']);
    $query =
    (new Query('/ip/hotspot/user/print'))
        ->where('profile', $elements['name']);

// Send query and read response from RouterOS
$user = $client->query($query)->read();

    // dd($response);
    $total = !empty($user) ? count($user) : 0;
                            ?>
                           

                          <div class="col-sm-2" style="max-height: 130px; padding-top: 10px;padding-left:5px;padding-right:5px;max-width: 100%;">
                            <h5 class="card-header bg-success d-flex justify-content-between align-items-center">
                              <?php echo !empty($elements['name']) ? $elements['name'] : '-' ?>
                              <br>
                             Limit :  <?php echo !empty($elements['rate-limit']) ? $elements['rate-limit'] :      ''  ?> <br>
                             User :  <?php echo $total ?> <br>
                              <a type="button" onclick="lihat('{{ $elements['name'] }}','{{ $elements['.id'] }}')" class="btn btn-sm btn-warning center-block" data-toggle="tooltip" title="Open"><i class="fa fa-search"></i> </a>
                              <a type="button" onclick="edit('{{ $elements['name'] }}','{{ $elements['.id'] }}')" class="btn btn-sm btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                            
                            </h5>

                             
                          </div>
                      <?php endforeach; ?>
                      <div class="col-sm-2" style="padding-top: 10px;padding-left:5px;padding-right:5px;max-width: 100%;height:300px">
                      <h5 class="card-header  bg-success d-flex justify-content-center">
                    
                        <button type="button" class="btn btn-sm btn-default center-block" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> </button>
                      
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
            <input type="text" class="form-control" name="name" class="from-control" id="name" placeholder="inputkan voucher" required>
          </div>
          <div class="form-group">
            <label for="username">Limit</label>
            <input type="text" class="form-control" name="rate" class="from-control" id="rate-limit" placeholder="inputkan voucher" required>
          </div>
          {{-- <div class="form-group">
            <label for="username">User</label>
            <input type="text" class="form-control" name="user" class="from-control" id="rate-limit" placeholder="inputkan voucher" required>
          </div> --}}
      
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

<div class="modal  fade " id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">List User Voucher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{ '/update-voucher' }}">
          @csrf
          <input type="hidden" name="id" id="id_profile">
          <input type="hidden" name="profile" id="profile">

        <div class="card-body">
          <div class="form-group">
            <label for="username">Generate Voucher</label>
            <input type="text" class="form-control" name="name" readonly class="from-control" id="name2" placeholder="inputkan voucher" >
          </div>
          <div class="form-group">
            <label for="username">Limit</label>
            <input type="text" class="form-control" name="rate" readonly class="from-control" id="rate-limit2" placeholder="inputkan voucher" >
          </div>
          <div class="form-group">
            <label for="username">User</label>
            <input type="text" class="form-control " name="total2" readonly class="from-control" id="total2" placeholder="inputkan voucher" >
          </div>

          {{-- <div class="form-group" id="user-edit" >
            <label for="username">Tambah User</label>
            <select name="user[]" id="user_id" class="form-control js-example-basic-multiple" multiple="multiple">
              @php
                  
               
        $userall = $client->query('/ip/hotspot/user/print')->read();
              @endphp
              @foreach($userall as  $lastName)
              <option value="{{ $lastName['.id'] }}">{{ $lastName['name'] }}</option>
              @endforeach
            </select>

          </div> --}}
      
        </div>
        <table class="table table-striped" id="list-user-dialgi">
          <thead>
            <tr>
              <th>No</th>
                                <th>User</th>
                                <th>Upload</th>
                                <th>Kadalwarsa</th>
            </tr>
          </thead>
          <tbody id="list-user">
            
          </tbody>
        </table>
     
        <div class="card-footer" id="footer-edit">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>

     
      </div>
    </div>
  </div>
</div>
@endsection



@push('js-page')

<script>

  function edit(name,id){
    $.ajax({
			url: 'showvoucher?name='+name+'&id='+id,
			datatype: "json",
			success: function(response) {
        $("#list-user").empty();
        var data = $.parseJSON(response);
        // console.log(data.voucher);
        $("#name2").attr('readonly',false);
        $("#rate-limit2").attr('readonly',false);
        
        $("#total2").attr('readonly',true);
        // $("#user").attr('readonly',false);
        
        
        $("#id_profile").val(data.id);
        $("#profile").val(data.name);
        $("#name2").val(data.voucher);

        $("#rate-limit2").val(data.rate);
        $("#total2").val(data.total);
        $("#user-edit").show();
          var no = 1;
          var tr="";
        $.each(data.user, function(index, values) {
          // console.log(index);
        
        var comment = '';
        if (typeof values.comment === "undefined") {
          comment = '-';
          }else{
            comment = values.comment
          }
          // console.log(comment);
            
                    tr += "<tr>";
                    tr += "<td>"+no+"</td>";
                    tr += "<td>"+values.name+"</td>";
                    tr += "<td>"+values.uptime+"</td>";
                    tr += "<td>"+comment+"</td>";
                    tr +=  "</tr>";


            
                    no++;
            });

            console.log(tr);
                $("#list-user").append(tr);
            $("#footer-edit").show();

            $('#exampleModal2').modal('toggle');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                  console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
                }       
              });
  }
  function lihat(name,id){
    $.ajax({
			url: 'daftarvoucher?name='+name+'&id='+id,
			datatype: "json",
			success: function(response) {
        $("#list-user").empty();
        var data = $.parseJSON(response);
        // console.log(data.voucher);
        $("#name2").attr('readonly',true);
        $("#rate-limit2").attr('readonly',true);
        $("#total2").attr('readonly',true);
        $("#name2").val(data.voucher);
        $("#rate-limit2").val(data.rate);
        $("#total2").val(data.total);
        $("#user-edit").hide();
          var no = 1;
          var tr="";
        $.each(data.user, function(index, values) {
          // console.log(index);
        
        var comment = '';
        if (typeof values.comment === "undefined") {
          comment = '-';
}else{
  comment = values.comment
}
// console.log(comment);
  
          tr += "<tr>";
           tr += "<td>"+no+"</td>";
           tr += "<td>"+values.name+"</td>";
           tr += "<td>"+values.uptime+"</td>";
           tr += "<td>"+comment+"</td>";
           tr +=  "</tr>";


   
           no++;
  });

  console.log(tr);
      $("#list-user").append(tr);
  $("#footer-edit").hide();

  $('#exampleModal2').modal('toggle');
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
			}       
		});

  }
</script>


@endpush