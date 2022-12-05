<table id="main-table" class="table table-striped table-bordered table-hover" data-table="blog">
        <thead class="thead-secondary">
            <th>Id</th>
            <th>Image</th>
            <th>Title</th>
            <th>Date posted</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($data["items"] as $item) {?>
                <tr data-id="<?= $item["id"]?>">
                    <td><?= $item["id"]?></td>
                    <td><img class="img-thumbnail" src="<?= $item["image"]?>" alt="<?= $item["name"]?>" style="width:100px;"></td>
                    <td><?= $item["title"]?></td>
                    <td><?= date("d/m/Y", $item["date_created"]) ?></td>
                    <td>
                        <a class="edit btn btn-outline-info" href="<?= BASE_URL."admin/blog/".$item["id"]?>"><i class="fa fa-pen"></i></a>
                        <a class="delete btn btn-danger" href="<?= BASE_URL."admin/delete/blog/".$item["id"]?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
</table>
    