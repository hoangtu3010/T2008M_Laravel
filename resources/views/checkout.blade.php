@extends("layout")
@section("main")
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Check out</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{asset("/")}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{asset("/admin/list-product")}}">List Product</a></li>
                            <li class="breadcrumb-item active"><a href="{{asset("/cart")}}">Cart</a></li>
                            <li class="breadcrumb-item active">Check Out</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content" style="margin-top: 20px">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Đặt hàng</h3>
                    </div>
                    <div class="card-body table-responsive p-6">
                        <form action="{{url("checkout")}}" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Customer Name</label>
                                        <input type="text" name="customer_name" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Customer Tel</label>
                                        <input type="tel" name="customer_tel" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Customer Address</label>
                                        <textarea name="customer_address" class="form-control"> </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">City</label>
                                        <select  name="city_id" class="form-control">
                                            @foreach($cities as $item)
                                                <option value="{{$item->__get("id")}}">{{$item->__get("city")}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table ">
                                        <tbody>
                                        @php $total = 0; $checkout = 0; @endphp
                                        @foreach($cart as $item)
                                            @php $total += $item->cart_qty * $item->__get("price"); @endphp

                                            <tr>
                                                <td><img src="{{$item->getImage()}}" width="50" height="50" alt="img">
                                                </td>
                                                <td>
                                                    <p>{{$item->__get("name")}}</p>
                                                    @if($item->qty < $item->cart_qty)
                                                        <p class="text-danger"><i> Sản phẩm không đủ số lượng! </i></p>
                                                        @php $checkout++ @endphp
                                                    @endif
                                                </td>
                                                <td>{{$item->__get("price")}}</td>
                                                <td>{{$item->cart_qty}}</td>
                                                <td>{{$item->__get("price") * $item->cart_qty}}</td>
                                            </tr>
                                        @endforeach

                                        <tfoot>
                                        <tr>
                                            <td colspan="4">Grand Total</td>
                                            <td>{{$total}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                @if($checkout == 0)
                                                    <div class="form-group">
                                                        <button class="btn btn-outline-success" type="submit">
                                                            Place order
                                                        </button>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

