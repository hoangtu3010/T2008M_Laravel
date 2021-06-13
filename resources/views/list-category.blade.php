@extends("layout")
@section("main")
    <div class="content-wrapper">
        <div class="container">
            <h1 class="text-center" style="padding: 10px 0;">Danh sách Category</h1>
            <a href="/add-category"><button class="btn btn-info" style="margin: 20px 0">Thêm mới</button></a>
            <table class="table table-striped table-hover">
                <thead>
                <th>Id</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Slug</th>
                <th>Count</th>
                <th width="10%" colspan="2" class="text-center">Tool</th>
                </thead>
                <tbody>
                <?php foreach ($dscategory as $item){ ?>
                <tr>
                    <td><?php echo $item["id"]; ?></td>
                    <td><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["painted"]; ?></td>
                    <td><?php echo $item["slug"]; ?></td>
                    <td><?php echo $item["count"]; ?></td>
                    <td class="text-center">
{{--                        <form action="/edit-category" method="post">--}}
{{--                            <input type="hidden" name="id" value="<?php echo $item["id"] ?>"/>--}}
{{--                            <button type="submit" style="border: none; background-color: unset"><i class="bi bi-pencil-square"></i></button>--}}
{{--                        </form>--}}
                        <a href="/edit-category?id=<?php echo $item["id"] ?>" style="color: #17a2b8"><i class="far fa-edit"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="/delete-category?id=<?php echo $item["id"] ?>" style="color: #dc3545"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
@endsection
