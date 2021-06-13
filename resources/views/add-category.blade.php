@extends("layout")
@section("main")
    <div class="content-wrapper">
        <div class="container">
            <h2 style="padding: 10px 0; border-bottom: 2px solid cadetblue;" >Thêm mới Category</h2>
            <form action="/save-category" method="post" style="margin-top: 40px" class="row g-3 needs-validation" novalidate>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Tên Category</label>
                    <input name="name" type="text" class="form-control" id="validationCustom01" placeholder="Name" required>
                    <div class="invalid-feedback">
                        Please enter name.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Slug</label>
                    <input name="slug" type="text" class="form-control" id="validationCustom02" placeholder="Slug" required>
                    <div class="invalid-feedback">
                        Please enter slug.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Count</label>
                    <input name="count" type="text" class="form-control" id="validationCustom02" placeholder="Count" required>
                    <div class="invalid-feedback">
                        Please enter count.
                    </div>
                </div>
                <div class="col-md-12" style="margin: 30px 0 20px 0">
                    <label for="validationCustom03" class="form-label">Mô tả</label>
                    <textarea name="painted" rows="7" class="form-control" id="validationCustom03"></textarea>
                </div>
                <div class="col-12">
                    <a href="/list-category"><button class="btn btn-secondary" type="button">Back</button></a>
                    <button class="btn btn-success" type="submit" style="float: right">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
