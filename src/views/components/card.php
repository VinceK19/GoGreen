<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
    <div class="products-single fix">
        <div class="box-img-hover">
            <!-- <div class="type-lb">
                <p class="sale">Sale</p>
            </div> -->
            <img src="<?= $product["image"]?>" class="img-fluid" alt="Image">
            <div class="mask-icon">
                <ul>
                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="View"><i class="fas fa-eye"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                </ul>
                <a class="cart" href="#">Add to Cart</a>
            </div>
        </div>
        <div class="why-text">
            <h4><?= $product["name"] ?></h4>
            <h5><?= number_format($product["price"], 3)?></h5>
        </div>
    </div>
</div>