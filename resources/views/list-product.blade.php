@extends("layout")
@section("main")
    <div class="content-wrapper">
        <div class="container">
            <h1 class="text-center" style="padding: 10px 0;">Danh Sách Sản Phẩm</h1>
            <a href="/add-product"><button class="btn btn-info" style="margin: 20px 0; float:right;">Thêm mới</button></a>
            <table class="table table-striped table-hover" style="color: #333;">
                <thead>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Mô Tả</th>
                <th>Giá</th>
                <th class="text-center">Nhà Cung Cấp</th>
                <th width="10%" colspan="3" class="text-center">Tools</th>
                </thead>
                <tbody>
                <?php foreach ($dssp as $item): ?>
                <tr>
                    <td><?php echo $item["id"]; ?></td>
                    <td><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["painted"]; ?></td>
                    <td><?php echo $item["price"]; ?></td>
                    <td class="text-center"><?php echo $item["ncc"]; ?></td>
                    <td class="text-center">
{{--                        <form action="/edit-product" method="post">--}}
{{--                            <input type="hidden" name="id" value="<?php echo $item["id"] ?>"/>--}}
{{--                            <button type="submit" style="border: none; background-color: unset; color: #17a2b8"><i class="far fa-edit"></i></button>--}}
{{--                        </form>--}}
                        <a href="/edit-product?id=<?php echo $item["id"] ?>" style="color: #17a2b8"><i class="far fa-edit"></i></a>
                    </td>
                    <td class="text-center">
                        <form action="?route=addcart" method="post">
                            <input type="hidden" name="id" value="<?php echo $item["id"] ?>"/>
                            <button type="submit" style="border: none; background-color: unset; color: #28a745"><i class="fas fa-cart-plus"></i></button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="?route=deleteproduct" method="post">
                            <input type="hidden" name="id" value="<?php echo $item["id"] ?>"/>
                            <button type="submit" style="border: none; background-color: unset;color: #dc3545"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
@endsection
