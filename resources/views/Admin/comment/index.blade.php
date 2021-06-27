

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
    <a href="{{route('comment.create')}}" title="Thêm mới" class="btn btn-success mb-2"><i class="fas fa-plus-square"></i></a>
    <table class="table table-inverse table-hover">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên độc giả</th>
          <th>Tên truyện</th>
          <th>Nội dung</th>
          <th>Trạng thái</th>
          <th>Created_at</th>
          <th>Action</th>

        </thead>
      </tr>
      <tbody>
        <?php $i=1; foreach ($cmt as $val) :
        ?>
        <tr>
          <td>{{$i}}</td>
          <td>{{$val->employer->username}}</td>
          <td>{{$val->story->name}}</td>
          <td>{{$val->content}}</td>
          <td>{{$val->status? 'Hiện':'Ẩn'}}</td>
          <td>{{$val->created_at}}</td>
          
          <td><a href="{{route('comment.edit',$val->id)}}" class="btn btn-primary float-left" title=""><i class="far fa-edit"></i></a>
            <a href="" class="float-left ml-2" title="">
              <form  action="{{route('comment.destroy',$val->id)}}" method="post">
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                @method('delete')
                @csrf
              </form>
            </a></td>
          </tr>
        <?php endforeach;  $i++;?>
      </tbody>
    </table>
     {{$cmt->links()}}
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