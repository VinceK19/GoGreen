<?php 
require_once(PATH_COMPONENTS."title-box.php")
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="title-all mt-4 mb-4">
                <h1>All Blogs</h1>
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
        <div class="col-md-4 col-sm-12">            
            <div class="filter-sidebar-left mt-4">
                <div class="title-left">
                    <h2><b>Popular Blogs</b></h2>
                </div>
                <div>
                    <?php foreach ($data["popular_blogs"] as $blog) {
                        require(PATH_COMPONENTS . "blog-side-item.php");
                    }?>
                </div>
            </div>
        </div>
    </div>
</div>