@extends("layout")
@section("main")
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cart</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{asset("/admin/list-product")}}">List
                                    Product</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content" style="margin-top: 20px">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cart</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-hover" style="color: #333;">
                                <thead>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quality</th>
                                </thead>
                                <tbody>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><img src="{{asset($item->getImage())}}" width="50px" height="50px"/></td>
                                        <td>{{$item->__get("name")}}</td>
                                        <td class="text-center">{{$item->price}}</td>
                                        <td class="text-center qty">
                                            <button class="button-change-qty plus">+</button>
                                            <input class="input-qty"  type="text" value="{{$item->cart_qty}}" />
                                            <button class="button-change-qty mint">-</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="{{asset("/checkout")}}" class="btn btn-outline-primary float-right">
                                Check Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<style>
    .qty{
        position: relative;
    }

    .button-change-qty {
        border: none;
        background-color: #ddd;
        border-radius: 100%;
        position: absolute;
    }

    .plus{
        top: 13px;
        left: 102px;
        padding: 2px 7px;
    }

    .mint{
        top: 13px;
        right: 113px;
        padding: 2px 9px;
    }

    .input-qty{
        max-width: 100px;
        border: 1px solid #ddd;
        padding: 2px;
        text-align: center;
        border-radius: 14px;
    }

    .input-qty:focus{
        outline: none;
    }
</style>
