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
                            <li class="breadcrumb-item"><a href="{{url("/admin/list-product")}}">List Product</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <div class="card-body">
                        <form class="row needs-validation" action="{{url("/admin/list-product/update-product", ["id"=>$item->id])}}" method="post" novalidate>
                            @csrf
                            <div class="col-md-4">
                                <label class="form-label">Image</label>
                                <input name="image" type="text" class="form-control" value="{{$item->image}}" />
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" id="validationCustom01" value="{{$item->name}}" required />
                                <div class="invalid-feedback">
                                    Please enter name.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Price</label>
                                <input name="price" type="number" class="form-control" id="validationCustom02" value="{{$item->price}}" required />
                                <div class="invalid-feedback">
                                    Please enter price.
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 20px">
                                <label for="validationCustom03" class="form-label">Qty</label>
                                <input name="qty" type="number" class="form-control" id="validationCustom03" value="{{$item->qty}}" required />
                                <div class="invalid-feedback">
                                    Please enter qty.
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 20px">
                                <label for="validationCustom04" class="form-label">Brand</label>
                                <select name="brand_id" class="form-control" id="validationCustom04" required>
                                    @foreach($brands as $br)
                                        <option @if($br->__get("id") == $item->Brand->__get("id")) selected @endif value="{{$br->__get("id")}}" >{{$br->name}}</option>
                                    @endforeach
{{--                                    @foreach($brands as $item)--}}
{{--                                        <option @if(old("brands_id")==$item->__get("id")) selected @endif value="{{$item->__get("id")}}">{{$item->__get("name")}}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                                <div class="invalid-feedback">
                                    Please select a supplier.
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 20px">
                                <label for="validationCustom05" class="form-label">Category</label>
                                <select name="category_id" class="form-control" id="validationCustom05" required>
                                    @foreach($categories as $ct)
                                        <option @if($ct->__get("id")==$item->Category->__get("id")) selected @endif value="{{$ct->__get("id")}}">{{$ct->name}}</option>
                                    @endforeach
                                    <option></option>
{{--                                    @foreach($categories as $item)--}}
{{--                                        <option @if(old("categories_id")==$item->__get("id")) selected @endif value="{{$item->__get("id")}}">{{$item->__get("name")}}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                                <div class="invalid-feedback">
                                    Please select a supplier.
                                </div>
                            </div>
                            <div class="col-md-12" style="margin: 30px 0 20px 0">
                                <label for="validationCustom05" class="form-label">Mô tả</label>
                                <textarea name="description" rows="7" class="form-control" id="validationCustom05">{{$item->description}}</textarea>
                            </div>
                            <div class="col-12" style="margin-top: 20px">
                                <a href="{{url("/admin/list-product")}}"><button class="btn btn-secondary" type="button">Back</button></a>
                                <button class="btn btn-outline-success" type="submit" style="float: right">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
