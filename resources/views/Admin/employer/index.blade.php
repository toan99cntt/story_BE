

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
          <h1 class="m-0">Quản lý độc giả</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a>/ Độc giả</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <a href="{{route('employer.create')}}" title="Thêm mới" class="btn btn-success mb-2"><i class="fas fa-plus-square"></i></a>
    <table class="table table-inverse table-hover">
      <thead>
        <tr>
          <th>STT</th>
          <th>Username</th>
          <th>Avatar</th>
          <th>Password</th>
          <th>Email</th>
          <th>Created_at</th>
          <th>Action</th>

        </thead>
      </tr>
      <tbody>
        <?php $i=1; foreach ($employer as $val) :
        ?>
        <tr>
          <td>{{$i}}</td>
          <td>{{$val->username}}</td>
          <td><img src="{{url('public/images/employer')}}/{{$val->avatar}}" alt=""  width="70px"></td>
          <td>{{$val->password}}</td>
          <td>{{$val->email}}</td>
          <td>{{$val->created_at}}</td>
          
          <td><a href="{{route('employer.edit',$val->id)}}" class="btn btn-primary float-left" title=""><i class="far fa-edit"></i></a>
            <a href="" class="float-left ml-2" title="">
              <form  action="{{route('employer.destroy',$val->id)}}" method="post">
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                @method('delete')
                @csrf
              </form>
            </a></td>
          </tr>
        <?php $i++; endforeach;   $i++;?>
      </tbody>
    </table>
     {{$employer->links()}}
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