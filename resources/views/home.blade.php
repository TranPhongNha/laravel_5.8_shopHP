@extends('layouts.admin')
<!-- //khi hoi tới sẽ load toàn bộ file layout.admin -->

@section('title')
    <title>Trang Chủ</title>
@endsection
<!-- @section('sidebar')
    @parent

        <p>This is appended to the master sidebar.</p>
@endsection -->

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partial.content-header',['name'=>'Home', 'key'=>'home'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- table  -->

                    <div class="col-md-12">
                        Trang Chủ
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


