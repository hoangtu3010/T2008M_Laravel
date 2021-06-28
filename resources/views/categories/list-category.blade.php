@extends("layout")
@section("main")
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content" style="margin-top: 20px">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Categories</h1>
                        <a href="{{url("/admin/list-category/add-category")}}"><button class="btn btn-outline-info" style="float: right">Thêm mới</button></a>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-hover">
                            <thead>
                            <th>Id</th>
                            <th width="40%">Name</th>
                            <th>Tổng số lượng sản phẩm</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th width="10%" colspan="2"></th>
                            </thead>
                            <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td class="text-center">{{count($item->Product)}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td class="text-center">
                                        {{--                        <form action="/edit-category" method="post">--}}
                                        {{--                            <input type="hidden" name="id" value="<?php echo $item["id"] ?>"/>--}}
                                        {{--                            <button type="submit" style="border: none; background-color: unset"><i class="bi bi-pencil-square"></i></button>--}}
                                        {{--                        </form>--}}
                                        <a href="{{url("/admin/list-category/edit-category", ["id"=>$item->id])}}" style="color: #17a2b8"><i class="far fa-edit"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url("/admin/list-category/delete-category", ["id"=>$item->id])}}" style="color: #dc3545"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
