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
                           <div class="col-lg-3 col-6">
                            <!-- small box -->
                            
                            <div class="small-box bg-success">
                                <h5 class="card-header bg-success d-flex justify-content-between align-items-center">
                                  
                                
                                
                                  <?php echo !empty($elements['name']) ? $elements['name'] : '-' ?>
                                  <br>
                                Limit :  <?php echo !empty($elements['rate-limit']) ? $elements['rate-limit'] :      ''  ?> <br>
                                User :  <?php echo $total ?> 
                                  <a  href="{{ '/voucher/edit/' }}{{ $elements['name'] }}/{{ $elements['.id'] }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> </a>
                                
                                </h5> 
                              
                              
                            </div>
                          </div>

                         

                          

                             
                      <?php endforeach; ?>
                      <div class="col-lg-3 col-6" style="padding-top: 10px;padding-left:5px;padding-right:5px;max-width: 100%;height:300px">
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

<div class="modal  fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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
            </tr>
          </thead>
          <tbody id="list-user">
            
          </tbody>
        </table>
     
        <div class="card-footer" id="footer-edit">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

     
      </div>
    </div>
  </div>
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
        // $("#user_id").attr('readonly',false);
        
        
        $("#id_profile").val(data.id);
        $("#profile").val(data.name);
        $("#name2").val(data.voucher);

        $("#rate-limit2").val(data.rate);
        $("#total2").val(data.total);
        $("#user-edit").show();
          var no = 1;
          var tr="";
        $.each(data.user, function(index, values) {
          console.log(data.user);
        
        var comment = '';
        var address = '';

        if (typeof values.comment === "undefined") {
          comment = '-';
          }else{
            comment = values.comment;
          }
          if (typeof values.address === "undefined") {
            address = '-';
          }else{
            address = values.address;
          }
          // console.log(comment);
            
                    tr += "<tr>";
                    tr += "<td>"+no+"</td>";
                    tr += "<td>"+values.name+"</td>";
                    tr += "<td>"+address+"</td>";

                    tr += "<td>"+values.uptime+"</td>";
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