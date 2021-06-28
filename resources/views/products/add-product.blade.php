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
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add</h3>
                    </div>
                    <div class="card-body">
                        <form class="row needs-validation" action="{{url("/admin/list-product/save-product")}}" method="post" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="col-md-4">
                                <label class="form-label">Image</label>
                                <input name="image" type="file" class="form-control" value="" style="line-height: 1.1"/>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" id="validationCustom01" value="" placeholder="Name" required />
                                <div class="invalid-feedback">
                                    Please enter name.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Price</label>
                                <input name="price" type="number" class="form-control" id="validationCustom02" value="" placeholder="Price" required />
                                <div class="invalid-feedback">
                                    Please enter price.
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 20px">
                                <label for="validationCustom03" class="form-label">Qty</label>
                                <input name="qty" type="number" class="form-control" id="validationCustom03" value="" placeholder="Quality" required />
                                <div class="invalid-feedback">
                                    Please enter qty.
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 20px">
                                <label for="validationCustom04" class="form-label">Brand</label>
                                <select name="brand_id" class="form-control" id="validationCustom04" required>
                                    <option selected disabled value="">Choose Brand...</option>
                                    @foreach($brands as $item)
                                        <option @if(old("brands_id")==$item->__get("id")) selected @endif value="{{$item->__get("id")}}">{{$item->__get("name")}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a supplier.
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 20px">
                                <label for="validationCustom05" class="form-label">Category</label>
                                <select name="category_id" class="form-control" id="validationCustom05" required>
                                    <option selected disabled value="">Choose Category...</option>
                                    @foreach($categories as $item)
                                        <option @if(old("category_id")==$item->__get("id")) selected @endif value="{{$item->__get("id")}}">{{$item->__get("name")}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a supplier.
                                </div>
                            </div>
                            <div class="col-md-12" style="margin: 30px 0 20px 0">
                                <label for="validationCustom06" class="form-label">Mô tả</label>
                                <textarea name="description" rows="7" class="form-control" id="validationCustom06"></textarea>
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
