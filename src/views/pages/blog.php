<?php 
require_once(PATH_COMPONENTS."title-box.php")
?>
<div class="container">
    <div class="title-all mt-4 mb-4">
        <h1>Latest Blog</h1>
    </div>
    <hr>
    <div class="shop-content-right">
        <div class="product-categorie-box">
            <?php foreach ($data["blogs"] as $blog) {
                require(PATH_COMPONENTS . "blog-item.php");
            }?>
        </div>
    </div>

    
    
</div>