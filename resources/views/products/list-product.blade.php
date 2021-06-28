@extends("layout")
@section("main")
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content" style="margin-top: 20px">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách sản phẩm</h3>
                        <a href="{{url("/admin/list-product/add-product")}}"><button class="btn btn-outline-info" style="float: right">Thêm mới</button></a>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-hover" style="color: #333;">
                            <thead>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th width="20%">Description</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quality</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Category</th>
                            <th width="15%" class="text-center">Updated At</th>
                            <th width="5%" colspan="2"></th>
                            </thead>
                            <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td><img src="{{asset($item->getImage())}}" width="50px" height="50px" /></td>
                                    <td>{{$item->__get("name")}}</td>
                                    <td>{{$item->__get("description")}}</td>
                                    <td class="text-center">{{$item->price}}</td>
                                    <td class="text-center">{{$item->qty}}</td>
                                    <td class="text-center">{{$item->Brand->__get("name")}}</td>
                                    <td class="text-center">{{$item->Category->__get("name")}}</td>
                                    <td class="text-center">{{$item->updated_at}}</td>
                                    <td class="text-center">
                                        <a href="{{url("/admin/list-product/edit-product", ["id"=>$item->id])}}" style="color: #17a2b8"><i class="far fa-edit"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url("/admin/list-product/delete-product", ["id"=>$item->id])}}" style="color: #dc3545"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <ul class="pagination float-right">
                            <li class="page-item">
                                {!! $products !!}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
