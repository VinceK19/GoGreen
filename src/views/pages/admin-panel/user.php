<?php require_once(PATH_PAGES . "admin-panel/header.php")?>
<div id="main" class="container">
    <div class="title-all">
        <h1>User</h1>
    </div>    
    <div class="table-container">
    <table id="main-table" class="table table-striped" data-table="user">
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
                <tr data-id="<?= $user["id"]?>">
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
                        <button class="edit btn btn-outline-info "><i class="fa fa-pen"></i></button>
                        <button class="delete btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    </div>
</div>
<script src="<?= BASE_URL."public/js/admin.js"?>"></script>