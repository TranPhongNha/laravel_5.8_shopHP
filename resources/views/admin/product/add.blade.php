@extends('layouts.admin')
<!-- //khi hoi tới sẽ load toàn bộ file layout.admin -->

@section('title')
    <title>Add Product</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet"/>

@endsection

{{--<!-- @section('sidebar')--}}
{{--    @parent--}}

{{--        <p>This is appended to the master sidebar.</p>--}}
{{--@endsection -->--}}

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partial.content-header',['name'=>'product', 'key'=>'Add'])
    <!-- /.content-header -->
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- form  -->

                            @csrf
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên Sản Phẩm">
                            </div>
                            {{--giá sp--}}
                            <div class="form-group">
                                <label>Giá Sản Phẩm</label>
                                <input type="text" class="form-control" name="price" placeholder="Nhập giá Sản Phẩm">
                            </div>
                            {{--hinh anh--}}
                            <div class="form-group">
                                <label>Ảnh Sản Phẩm</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>
                            {{--hinh anh chi tei61t --}}
                            <div class="form-group">
                                <label>Ảnh chi tiết Sản Phẩm</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>

                            <!-- danh mục cha  -->
                            <div class="form-group">
                                <label>Chọn Danh Mục </label>
                                <select class="form-control select2_init" name="category_id">
                                    <option name="parent_id" value="">Chọn danh mục</option>
                                    <!-- do kieu string nen dùng {4xChấm than}-->
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <!-- end danh mục cha -->

                            {{--tag--}}
                            <div class="form-group">
                                <label>Nhập tags cho SP</label>
                                <select name="tags[]" class="form-control tags_select_choose"
                                        multiple="multiple"></select>
                            </div>


                        </div>
                        {{--content--}}


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea class="form-control tinymce_editor_init" name="contents" rows="15"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </form>
        <!-- end form  -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')


    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('vendors/select2/tinymce.min.js')}}" referrerpolicy="origin"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>

@endsection


{{------- da chạy 3 câu lệng cua timymce--}}

