
@extends('layouts.admin')

@section('title')
    <title>Danh sách post</title>
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Post List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('posts.form_add') }}" class="btn btn-success float-right m-2">Thêm Post</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Describe</th>
                                <th scope="col">Category</th>
                                <th scope="col">Tag</th>
                                <th scope="col">Created At</th>
                                <th scope="col" width="5%">Sửa</th>
                                <th scope="col" width="5%">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($postList as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->category_id }}</td>
                                    <td>{{ $item->tag_id }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('posts.getEdit', ['id'=>$item->id]) }}" class="btn btn-warning btn-sm">Sửa</a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Ban Chac Chan Muon Xoa??')" href="{{ route('posts.delete', ['id'=>$item->id]) }}" methods="post" class="btn-block btn-danger btn-sm action_delete">
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection


