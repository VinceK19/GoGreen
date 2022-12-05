<table id="main-table" class="table table-striped table-bordered table-hover" data-table="product">
        <thead class="thead-secondary">
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Brand</th>
            <th>Stock</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($data["items"] as $item) {?>
                <tr data-id="<?= $item["id"]?>">
                    <td><?= $item["id"]?></td>
                    <td><img class="img-thumbnail" src="<?= $item["image"]?>" alt="<?= $item["name"]?>" style="width:100px;"></td>
                    <td><?= $item["name"]?></td>
                    <td><?=number_format($item["price"]) ?> đ</td>
                    <td><?= $item["brand"] ?></td>
                    <td><?= $item["stock"]?></td>
                    <td>
                        <a class="edit btn btn-outline-info" href="<?= BASE_URL."admin/product/".$item["id"]?>"><i class="fa fa-pen"></i></a>
                        <a class="delete btn btn-danger" href="<?= BASE_URL."admin/delete/product/".$item["id"]?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
</table>
    