<?php 
$blog = $data["blog"];
require_once(PATH_COMPONENTS."title-box.php");
?>
<div id="blog-main" class="container mt-5" data-blog-id="<?= $blog["id"]?>">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="title-all mt-4 mb-4">
                <p class="text-muted"><i class="fa fa-calendar-alt mr-2"></i> <?= date("F d, Y",$blog["date_created"])?></p>
                <h1><?= $blog["title"] ?></h1>
            </div>
            <img class="d-block w-100" src="<?= $blog["image"]?>" alt="">
            <div><?= $blog["content"] ?></div>        
            <div class="row my-5 ">
                <?php require_once(PATH_COMPONENTS."comment-card.php")?>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">            
            <div class="filter-sidebar-left mt-4">
                <div class="title-left">
                    <h2><b>Recomendation</b></h2>
                </div>
                <div>
                    <?php foreach ($data["recomended_blogs"] as $blog) {
                        require(PATH_COMPONENTS . "blog-side-item.php");
                    }?>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script src="<?= BASE_URL."public/js/blog.js"?>"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>