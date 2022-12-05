<?php $item = $data["item"]?>
<?php require_once(PATH_PAGES . "admin-panel/header.php")?>
<div class="container mt-5">
<div class="title-all">
    <h1>Update brand</h1>
</div>
<form id="modal-form" action="<?= BASE_URL."admin/update/brand/".$item["id"]?>" method="post" data-id="<?= $item["id"]?>">
    <div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-12">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="<?= $item["name"]?>">
        </div>
    </div>
    </div>
    <button type="submit" class="save btn btn-primary" form="modal-form">Save changes</button>
</form>
</div>

<script>
    CKEDITOR.replace("editor")
</script>