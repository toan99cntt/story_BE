

@extends('admin.master')
@section('title','Trang quản lý tác giả')
@section('admin.main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Author Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a>/ Author</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="content">
      <form method="POST" action="{{route('author.update',$author->id)}}">
        @csrf
         {{ method_field('PUT') }}
        <div class="form-group ">
          <label  class="col-sm-2 form-control-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" value="{{$author->name}}">
            @error('name')
            <small style="color: red">{{$message}}</small>
            @enderror
          </div>
        </div>
        <div class="form-group ">
          <label  class="col-sm-2 form-control-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$author->username}}" name="username">
            <!-- @error('username')
            <small style="color: red">{{$message}}</small>
            @enderror -->
          </div>
        </div>
        <div class="form-group ">
          <label  class="col-sm-2 form-control-label">Password</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$author->password}}" name="password">
            @error('password')
            <small style="color: red">{{$message}}</small>
            @enderror
          </div>
        </div>
        <div class="form-group ">
          <label  class="col-sm-2 form-control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" value="{{$author->email}}" name="email">
            <!-- @error('email')
            <small style="color: red">{{$message}}</small>
            @enderror -->
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('author.index')}}" title="" class="btn btn-danger">Back</a>
          </div>
        </div>
      </form>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
@stop()