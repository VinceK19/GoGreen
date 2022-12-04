<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
    <div class="products-single fix">
        <div class="box-img-hover">
            <!-- <div class="type-lb">
                <p class="sale">Sale</p>
            </div> -->
            <img id="product-image-<?= $product["id"]?>" src="<?= $product["image"]?>" class="img-fluid" alt="Image">
            <div class="mask-icon">
                <ul>
                    <li><a href="<?= BASE_URL."shop/item/".$product['id']?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="View"><i class="fas fa-eye"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                </ul>
                <?php if (isset($_SESSION["user"])) { ?>
                    <a class="cart" href="<?= BASE_URL."shop/item/".$product["id"]?>" >Add to Cart</a>
                <?php }?>
            </div>
        </div>
        <div class="why-text">
            <h4 id="product-name-<?= $product["id"]?>"><a href="<?= BASE_URL."shop/item/".$product['id']?>"><?= $product["name"] ?></a></h4>
            <h5 id="product-price-<?= $product["id"]?>"><?= number_format($product["price"])?> đ</h5>
        </div>
    </div>
</div>