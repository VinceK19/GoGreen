<?php require_once(PATH_PAGES . "admin-panel/header.php")?>
<div id="main" class="container mt-4">
    <div class="title-all">
        <div class="d-flex justify-content-between">
            <h1>User</h1>
            <a class="btn btn-primary" href="<?= BASE_URL."admin/user/new"?>">Add</a>    
        </div>
    </div>    
    <div class="table-container">
        <?php require_once(PATH_TABLE_ADMIN."user-table.php")?>
    </div>
</div>
<script src="<?= BASE_URL."public/js/admin.js"?>"></script>