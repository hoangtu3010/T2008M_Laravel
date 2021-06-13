@extends("layout")
@section("main")
    <div class="content-wrapper">
        <div class="container">
            <h2 style="padding: 10px 0; border-bottom: 2px solid cadetblue;" >Sửa Thông Tin</h2>
            <form style="margin-top: 40px" class="row g-3 needs-validation" action="/save-product" method="post" novalidate>
                <input type="hidden" name="id" value="" />
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Tên Sản Phẩm</label>
                    <input name="name" type="text" class="form-control" id="validationCustom01" value="" required />
                    <div class="invalid-feedback">
                        Please enter name.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Giá</label>
                    <input name="price" type="text" class="form-control" id="validationCustom02" value="" required />
                    <div class="invalid-feedback">
                        Please enter price.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Nhà Cung Cấp</label>
                    <select name="ncc" class="form-control" id="validationCustom04" required>
                        <option></option>
                        <option>Apple</option>
                        <option>Samsung</option>
                        <option>Oppo</option>
                        <option>Nokia</option>
                        <option>Huawei</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a supplier.
                    </div>
                </div>
                <div class="col-md-12" style="margin: 30px 0 20px 0">
                    <label for="validationCustom03" class="form-label">Mô tả</label>
                    <textarea name="painted" rows="7" class="form-control" id="validationCustom03"></textarea>
                </div>
                <div class="col-12" style="margin-top: 20px">
                    <a href="/list-product"><button class="btn btn-secondary" type="button">Back</button></a>
                    <button class="btn btn-success" type="submit" style="float: right">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection
