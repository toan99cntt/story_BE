

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
          <h1 class="m-0">Quản lý chương</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a>/ Chương</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <form method="POST" action="{{route('chapter.store')}}">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-4 pl-3">
          <label >Tên chương</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_chap">
          @error('name_chap')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
        </div>
        <div class="form-group col-md-4">
          <label >Thể loại</label>
          <select name="id_story" class="form-control">
            <option selected>----Tên truyện----</option>

            <?php foreach ($story as $story): ?>
              <option value="{{$story->id}}">{{$story->name}}</option>
            <?php endforeach ?>

          </select>
          @error('id_story')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
      </div>

      <div class="form-group col-md-10">

        <label  class="col-sm-2 form-control-label">Nội dung</label>
        <div class="col-sm-10 ">
          <textarea style="width: 100%; height:400px" class="form-control" name="content">

          </textarea>
          @error('content')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Thêm mới</button>
          <a href="{{route('chapter.index')}}" title="" class="btn btn-danger">Trợ lại</a>
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