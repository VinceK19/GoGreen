<?php $item = $data["item"]?>
<?php require_once(PATH_PAGES . "admin-panel/header.php")?>
<div class="container mt-5">
<div class="title-all">
    <h1>Update user</h1>
</div>
<form id="modal-form" action="<?= BASE_URL."admin/update/member/".$item["id"]?>" method="post" data-id="<?= $item["id"]?>">
    <div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-12">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" value="<?= $item["username"]?>">
        </div>
        <div class="form-group col-md-6">
            <label for="first_name">First Name</label>
            <input class="form-control" type="text" name="first_name" value="<?= $item["first_name"]?>">
        </div>
        <div class="form-group col-md-6">
            <label for="last_name">Last name</label>
            <input class="form-control" type="text" name="last_name" value="<?= $item["last_name"]?>">
        </div>
        <div class="form-group col-md-12">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="<?= $item["email"]?>">
        </div>
        <div class="form-group col-md-12">
            <label for="phone">Phone</label>
            <input class="form-control" type="text" name="phone" value="<?= $item["phone"]?>">
        </div>
        <div class="form-group col-md-12">
            <label for="address">Address</label>
            <input class="form-control" type="text" name="address" value="<?= $item["address"]?>">
        </div>
    </div>
    </div>
    <button type="submit" class="save btn btn-primary" form="modal-form">Save changes</button>
</form>
</div>

<script>
    CKEDITOR.replace("editor")
</script>