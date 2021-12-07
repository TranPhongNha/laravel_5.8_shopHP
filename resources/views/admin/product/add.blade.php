@extends('layouts.admin')
<!-- //khi hoi tới sẽ load toàn bộ file layout.admin -->

@section('title')
    <title>Add Product</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

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

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- form  -->
                        <form action="" method="post" enctype="multipart/form-data">
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
                                <input type="file" class="form-control" name="feature_image_path">
                            </div>
                            {{--hinh anh chi tei61t --}}
                            <div class="form-group">
                                <label>Ảnh chi tiết Sản Phẩm</label>
                                <input type="file" multiple class="form-control" name="image_path[]">
                            </div>

                            <!-- danh mục cha  -->
                            <div class="form-group">
                                <label>Chọn Danh Mục </label>
                                <select class="form-control select2_init" name="parent_id">
                                    <option name="parent_id" value="">Chọn danh mục</option>
                                    <!-- do kieu string nen dùng {4xChấm than}-->
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <!-- end danh mục cha -->

                            {{--tag--}}
                            <div class="form-group">
                                <label>Nhập tags cho SP</label>
                                <select class="form-control tags_select_choose" multiple="multiple"></select>
                            </div>

                            {{--content--}}
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea class="form-control" name="content" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <!-- end form  -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function () {
            $(".tags_select_choose").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            })
            $(".select2_init").select2({
                placeholder: "Chọn danh mục",
                allowClear: true
            })


        })
    </script>
@endsection


