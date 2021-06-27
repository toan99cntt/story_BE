

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
            <h1 class="m-0">Quản lý danh mục</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a>/ Danh mục</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <form method="POST" action="{{route('category.store')}}">
        @csrf
        <div class="form-group ">
          <label  class="col-sm-2 form-control-label">Tên danh mục</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Name">
            @error('name')
            <small style="color: red">{{$message}}</small>
            @enderror
          </div>
        </div>
        
        <div class="form-group ">
          <label  class="col-sm-2 form-control-label">Trạng thái</label>
          <div class="col-sm-10">
            <div class="radio">
              <label>
                <input type="radio" name="status" id="exampleRadios1" value="1" checked>
                Hiện
              </label>
            </div>
            <div class="radio">
              <label> 
                <input type="radio" name="status"  value="0">Ẩn
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Tạo</button>
            <a href="{{route('category.index')}}" title="" class="btn btn-danger">Trở lại</a>
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