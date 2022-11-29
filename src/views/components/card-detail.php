<div class="list-view-box">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="products-single fix">
                <div class="box-img-hover">
                    <img src="<?= $product["image"]?>" class="img-fluid" alt="Image">
                    <div class="mask-icon">
                        <ul>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
            <div class="why-text full-width">
                <h4><?= $product["name"]?></h4>
                <h5><?= number_format($product["price"],3)?>đ</h5>
                <p><?= $product["description"]?></p>
                <a class="btn hvr-hover" href="#">Add to Cart</a>
            </div>
        </div>
    </div>
</div>