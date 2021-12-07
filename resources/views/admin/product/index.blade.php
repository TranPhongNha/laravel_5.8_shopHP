@extends('layouts.admin')
<!-- //khi hoi tới sẽ load toàn bộ file layout.admin -->

@section('title')
    <title>Add product</title>
@endsection
<!-- @section('sidebar')
    @parent

        <p>This is appended to the master sidebar.</p>
@endsection -->

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partial.content-header',['name'=>'product', 'key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- table  -->
                    <div class="col-md-12">
                        <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Acction</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                            @foreach($categories as $category)--}}
                            <tr>
                                <th scope="row">1</th>
                                <td>Iphone 5</td>
                                <td>22.000.000</td>
                                <td>
                                    <img src="" alt="">
                                </td>
                                <td>Điện thoại</td>
                                <td>
                                    <a href=""
                                       class="btn  btn-default">Edit</a>
                                    <a href=""
                                       class="btn  btn-danger">Delete</a>
                                </td>
                            </tr>
                            {{--                            @endforeach--}}
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{--pagination--}}
                        {{--                        {{$categories->links()}}--}}
                    </div>
                    <!-- end table  -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


