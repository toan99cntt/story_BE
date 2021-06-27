

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
          <h1 class="m-0">Quản lý truyện</h1>
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
    <form method="POST" action="{{route('story.store')}}" enctype="multipart/form-data">
      @csrf
      
      <div class="form-group ">
        <label  class="col-sm-2 form-control-label">Tên truyện</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name">
          @error('name')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="form-group ">
        <label  class="col-sm-2 form-control-label">Ảnh</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" name="image">
          @error('image')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
      </div>
      
      <div class="form-group ">
        <label  class="col-sm-2 form-control-label">Mô tả</label>
        <div class="col-sm-10 ">
          <textarea style="width: 100%; height:100px" class="form-control" name="content">

          </textarea>
          @error('content')
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
              Còn tiếp
            </label>
            <label class="ml-3"> 
              <input type="radio" name="status"  value="0"> Hoàn thành
            </label>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-5">
          <label >Lượt xem</label>
          <input type="number" name="count" class="form-control">
          @error('count')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group col-md-5">
          <label >Thể loại</label>
          <select name="id_genre" class="form-control">
            <option selected>---Thể loại---</option>

            <?php foreach ($genre as $genre): ?>
              <option value="{{$genre->id}}">{{$genre->name}}</option>
            <?php endforeach ?>

          </select>
          @error('id_genre')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-5">
          <label >Tác giả</label>
          <select name="id_author" class="form-control">
            <option selected>---Tác giả---</option>
            <?php foreach ($author as $author): ?>
              <option value="{{$author->id}}">{{$author->name}}</option>
            <?php endforeach ?>
          </select>
          @error('id_author')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group col-md-5">
          <label >Danh mục</label>
          <select name="id_category" class="form-control">
            <option selected>---Danh mục---</option>
            <?php foreach ($category as $category): ?>
              <option value="{{$category->id}}">{{$category->name}}</option>
            <?php endforeach ?>

          </select>
          @error('id_category')
          <small style="color: red">{{$message}}</small>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Tạo mới</button>
          <a href="{{route('story.index')}}" title="" class="btn btn-danger">Trở lại</a>
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