<table id="main-table" class="table table-striped table-bordered table-hover" data-table="product">
        <thead class="thead-secondary">
            <th >Id</th>
            <th >Username</th>
            <th >FIrst Name</th>
            <th >Last Name</th>
            <th >Phone</th>
            <th >Email</th>
            <th >Address</th>
            <th >Last Login</th>
            <th >Date Created</th>
            <th class="afix">Action</th>
        </thead>
        <tbody>
            <?php foreach ($data["users"] as $user) {?>
                <tr data-id="<?= $item["id"]?>">
                <td><?= $user["id"]?></td>
                    <td><?= $user["username"]?></td>
                    <td><?= $user["first_name"]?></td>
                    <td><?= $user["last_name"]?></td>
                    <td><?= $user["phone"]?></td>
                    <td><?= $user["email"]?></td>
                    <td><?= $user["address"]?></td>
                    <td><?= date("d-m-Y", $user["last_login"]) ?></td>
                    <td><?= date("d-m-Y", $user["date_created"]) ?></td>
                    <td>
                        <a class="edit btn btn-outline-info" href="<?= BASE_URL."admin/user/".$user["id"]?>"><i class="fa fa-pen"></i></a>
                        <a class="delete btn btn-danger" href="<?= BASE_URL."admin/delete/member/".$user["id"]?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
</table>
    