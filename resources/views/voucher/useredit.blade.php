@extends('layouts.master')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit User</h1>
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
                  <h3 class="card-title">Edit User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @php
                    // dd($detail);
                @endphp
                <form role="form" method="POST" action="{{ '/update-user' }}">
                    @csrf
          <input type="hidden" name="id" id="id" value="{{ $user[0]['.id'] }}">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="username">User</label>
                      <input type="text" class="form-control" name="user" id="user"  value="{{ !empty($user[0]['name']) ? $user[0]['name'] : '' }}" class="from-control"  placeholder="inputkan User" >
                    </div>
          
                    <div class="form-group">
                      <label for="username">Address</label>
                      <input type="text" class="form-control" name="address" id="address"  value="{{ !empty($user[0]['address']) ? $user[0]['address'] : '' }}" class="from-control" placeholder="inputkan Address" >
                    </div>
          
                    <div class="form-group">
                      <label for="username">Rate Limit</label>
                      <input type="text" class="form-control" name="ratelimit" id="ratelimit"  value="{{ !empty($user[0]['rate-limit']) ? $user[0]['rate-limit'] : '' }}"  class="from-control"  placeholder="inputkan Rate Limit" >
                    </div>
          
                    <div class="form-group">
                      <label for="username">Fup</label>
                      <input type="text" class="form-control" name="fup" id="fup"  value="{{ !empty($user[0]['fup']) ? $user[0]['fup'] : '' }}" class="from-control"  placeholder="inputkan Fup" >
                    </div>
          
                    <div class="form-group">
                      <label for="username">Kadalwarsa</label>
                      <input type="text" class="form-control" name="kadalwarsa" id="kadalwarsa"  value="{{ !empty($user[0]['comment']) ? $user[0]['comment'] : '' }}"  class="from-control"  placeholder="inputkan Kadalwarsa" >
                    </div>
                
                  </div>
                  
          
                  
               
                  <div class="card-footer" id="footer-edit">
                    <button type="submit" class="btn btn-primary">Update</button>
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

