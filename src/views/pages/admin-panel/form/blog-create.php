<?php
require_once(PATH_PAGES . "admin-panel/header.php");
?>
<div class="container mt-5">
<div class="title-all">
    <h1>Update blog</h1>
</div>
<form id="modal-form" action="<?= BASE_URL."admin/create/blog/"?>" method="post" >
    <div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-12">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" value="">
        </div>
        <div class="form-group col-md-12">
            <label for="image">Image</label>
            <input class="form-control" type="text" name="image" value="">
        </div>
        <div class="form-group col-md-12">
            <label for="preview">Preview</label>
            <textarea class="form-control" name="preview" rows="3"></textarea>
        </div>
        <div class="form-group col-md-12">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="editor" cols="30" rows="10"></textarea>
        </div>
    </div>
    </div>
    <button type="submit" class="save btn btn-primary" form="modal-form">Save changes</button>
</form>
</div>

<script>
    CKEDITOR.replace("editor")
</script>