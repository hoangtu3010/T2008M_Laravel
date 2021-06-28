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
                            <li class="breadcrumb-item"><a href="{{url("/admin/list-category")}}">List Category</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
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
                        <form action="{{url("/admin/list-category/save-category")}}" method="post" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group" style="margin-bottom: 30px">
                                <label for="validationCustom01" class="form-label">Tên Category</label>
                                <input name="name" type="text" class="form-control" id="validationCustom01" placeholder="Name" required>
                                <div class="invalid-feedback">
                                    Please enter name.
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{url("/admin/list-category")}}"><button class="btn btn-secondary" type="button">Back</button></a>
                                <button class="btn btn-outline-success" type="submit" style="float: right">Thêm mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
