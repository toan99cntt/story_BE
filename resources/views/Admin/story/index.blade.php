

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
    <a href="{{route('story.create')}}" title="Thêm mới" class="btn btn-success mb-2"><i class="fas fa-plus-square"></i></a>
    <table class="table table-inverse table-hover">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên truyện</th>
          <th>Ảnh</th>
          <!-- <th>Mô tả</th> -->
          <th>Lượt xem</th>
          <th>Trạng thái</th>
          <th>Thể loại</th>
          <th>Danh mục</th>
          <th>Tác giả</th>
          <th>Created_at</th>
          <th>Action</th>

        </thead>
      </tr>
      <tbody>
        <?php $i=1; foreach ($story as $val) :
        ?>
        <tr>
          <td>{{$i}}</td>
          <td>{{$val->name}}</td>
          <td><img src="{{url('public/images/story')}}/{{$val->image}}" width="80px" alt=""></td>
          <!-- <td>{{$val->content}}</td> -->
          <td>{{$val->count}}</td>
          <td>{{$val->status?'Còn tiếp':'Hoàn thành'}}</td>
          <td>{{$val->genre->name}}</td>
          <td>{{$val->category->name}}</td>
          <td>{{$val->author->name}}</td>
          <td>{{$val->created_at}}</td>
          <td><a href="{{route('story.edit',$val->id)}}" class="btn btn-primary float-left" title=""><i class="far fa-edit"></i></a>
            <a href="" class="float-left ml-2" title="">
              <form  action="{{route('story.destroy',$val->id)}}" method="post">
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                @method('delete')
                @csrf
              </form>
            </a></td>
          </tr>
        <?php $i++; endforeach;  ?>
      </tbody>
    </table>
     {{$story->links()}}
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