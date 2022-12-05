<table id="main-table" class="table table-striped table-bordered table-hover" data-table="blog">
        <thead class="thead-secondary">
            <th>Id</th>
            <th class="w-100">Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($data["items"] as $item) {?>
                <tr data-id="<?= $item["id"]?>">
                    <td><?= $item["id"]?></td>
                    <td><?= $item["name"]?></td>
                    <td>
                        <a class="edit btn btn-outline-info" href="<?= BASE_URL."admin/brand/".$item["id"]?>"><i class="fa fa-pen"></i></a>
                        <a class="delete btn btn-danger" href="<?= BASE_URL."admin/delete/brand/".$item["id"]?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
</table>
    