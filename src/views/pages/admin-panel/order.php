<?php require_once(PATH_PAGES . "admin-panel/header.php")?>
<div id="main" class="container mt-4">
    <div class="title-all">
        <h1>Order</h1>
    </div>    
    <div class="table-container">
        <?php require_once(PATH_TABLE_ADMIN."order-table.php")?>
    </div>
</div>
<script src="<?= BASE_URL."public/js/admin.js"?>"></script>
