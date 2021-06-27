

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
          <h1 class="m-0">Quản lý Audio</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a>/ Truyện</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <form method="POST" action="{{route('audio.store')}}" enctype="multipart/form-data">
      @csrf
      
      <div class="form-group ">
        <label  class="col-sm-2 form-control-label">Tên tiêu đề</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  name="title">
          @error('title')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="form-group ">
        <label  class="col-sm-2 form-control-label">Link</label>
        <div class="col-sm-10 ">
          <textarea style="width: 100%; height:100px" name="link">
            
          </textarea>
          @error('link')
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
            <label> 
              <input type="radio" name="status"  value="0">Ẩn
            </label>
          </div>
        </div>
      </div>
      <div class="form-row">
        
        <div class="form-group col-md-5">
          <label >Tác giả</label>
          <select name="id_admin" class="form-control">
            <option selected value="">Tác giả</option>

            <?php foreach ($admin as $admin): ?>
              <option value="{{$admin->id}}">{{$admin->username}}</option>
            <?php endforeach ?>

          </select>
          @error('id_admin')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Tạo mới</button>
          <a href="{{route('audio.index')}}" title="" class="btn btn-danger">Trở lại</a>
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