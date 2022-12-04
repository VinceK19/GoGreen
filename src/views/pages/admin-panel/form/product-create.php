<?php require_once(PATH_PAGES . "admin-panel/header.php")?>
<div class="container mt-5">
<div class="title-all">
    <h1>Create product</h1>
</div>
<form id="modal-form" action="<?= BASE_URL."admin/create/product"?>" method="post">
    <div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-12">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="">
        </div>
        <div class="form-group col-md-6">
            <label for="price">Price</label>
            <input class="form-control" type="number" name="price" value="">
        </div>
        <div class="form-group col-md-6">
            <label for="image">Image</label>
            <input class="form-control" type="text" name="image" value="">
        </div>
        <div class="form-group col-md-6">
            <label for="brand">Brand</label>
            <select class="form-control" name="brand">
                <option value="" selected></option>
                <?php foreach ($data["brands"] as $brand) { ?>
                    <option value="<?= $brand["id"]?>"><?= $brand["name"]?></option>
                    <?php }?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="stock">Stock</label>
            <input class="form-control" type="number" name="stock" value="">
        </div>
        <div class="form-group col-md-12">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="editor" cols="30" rows="10"></textarea>
        </div>
    </div>
    </div>
    <button type="submit" class="save btn btn-primary" form="modal-form">Create new</button>
</form>
</div>

<script>
    CKEDITOR.replace("editor")
</script>