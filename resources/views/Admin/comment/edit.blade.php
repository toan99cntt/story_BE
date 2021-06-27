

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
          <h1 class="m-0">Quản lý bình luận</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a>/ Bình luận</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <form method="POST" action="{{route('comment.update',$cmt->id)}}">
      @csrf
      {{ method_field('PUT') }}

      <div class="col-md-10">
        <div class="form-row">
        <div class="form-group col-md-5">
          <label >Tên độc giả</label>
          <select name="id_employer" class="form-control">
            <option value="{{$cmt->id_employer}}">---{{$cmt->employer->name}}---</option>

            <?php foreach ($employer as $employer): ?>
              <option value="{{$employer->id}}">{{$employer->name}}</option>
            <?php endforeach ?>

          </select>
          @error('id_employer')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group col-md-5">
          <label >Tên truyện</label>
          <select name="id_story" class="form-control">
            <option value="{{$cmt->id_story}}">---{{$cmt->story->name}}---</option>

            <?php foreach ($story as $story): ?>
              <option value="{{$story->id}}">{{$story->name}}</option>
            <?php endforeach ?>

          </select>
          @error('id_story')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
      </div>
      </div>
      
      <div class="form-group ml-1">
        <label  class="col-sm-2 form-control-label">Trạng thái</label>
        <div class="col-sm-10">
          <div class="radio">
            <label>
              <input type="radio" name="status" value="1" checked> Hiện
            </label>
            <label>
              <input class="ml-3" type="radio" name="status" id="exampleRadios1" value="0">Ẩn
            </label>
          </div>
          
        </div>
      </div>
      <div class="form-group col-md-10">

        <label  class="col-sm-2 form-control-label">Nội dung</label>
        <div class="col-sm-10 ">
          <textarea style="width: 100%; height:200px" class="form-control" name="content">
            {{$cmt->content}}
          </textarea>
          @error('content')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Tạo mới</button>
          <a href="{{route('comment.index')}}" title="" class="btn btn-danger">Trở lại</a>
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