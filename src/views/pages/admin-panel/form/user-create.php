<?php require_once(PATH_PAGES . "admin-panel/header.php")?>
<div class="container mt-5">
<div class="title-all">
    <h1>Update user</h1>
</div>
<form id="modal-form" action="<?= BASE_URL."admin/create/member"?>" method="post" data-id="<?= $item["id"]?>">
    <div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-12">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" value="">
        </div>
        <div class="form-group col-md-12">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" value="">
        </div>
    </div>
    </div>
    <button type="submit" class="save btn btn-primary" form="modal-form">Save changes</button>
</form>
</div>

<script>
    CKEDITOR.replace("editor")
</script>