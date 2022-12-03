<?php 
require_once PATH_COMPONENTS."title-box.php";
$item = $data["item"];
?>
<!-- Start Shop Detail  -->
<div class="shop-detail-box-main" data-product-id="<?= $item["id"]?>">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div class="carousel-item active"> <img class="d-block w-100" src="<?= $item["image"]?>" alt="First slide"> </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2><?= $item["name"]?></h2>
                    <h5><?= number_format($item["price"])?>đ</h5>
                    <p class="available-stock"><span> <?= $item["stock"]?> left in stock<p>
                    <h4>Description:</h4>
                    <p><?= $item["description"]?></p>
                    <ul>
                        <li>
                            <div class="form-group quantity-box">
                                <label class="control-label">Quantity</label>
                                <input id="quantity" class="form-control" value="0" min="0" max="20" type="number">
                            </div>
                        </li>
                    </ul>

                    <div class="price-box-bar">
                        <div class="cart-and-bay-btn">
                            <?php if (isset($_SESSION["user"])) { ?>
                                <a id="addToCart" class="btn hvr-hover" data-fancybox-close="" href="">Add to cart</a>
                            <?php } else { ?>
                                <a class="btn hvr-hover" href="<?= BASE_URL."account/login"?>">Log in to purchase</a>
                            <?php }?>
                        </div>
                    </div>

                    <div class="add-to-btn">
                        <div class="add-comp">
                            <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                            <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                        </div>
                        <div class="share-bar">
                            <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row my-5 ">
            <?php require_once(PATH_COMPONENTS."comment-card.php")?>
        </div>

    </div>
</div>
<!-- End Cart -->
<script src="<?= BASE_URL."public/js/shop.js"?>"></script>