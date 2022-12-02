<?php 
require_once PATH_COMPONENTS."title-box.php";
?>    
    
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <?php include(PATH_COMPONENTS."cart-table.php")?>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit" form="cart-table">
                        <!-- <button value="Update Cart" type="submit" form="cart-table">Update</button> -->
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <?php require(PATH_COMPONENTS."cart-summary.php")?>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="cart/checkout" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
    <script src="<?= BASE_URL."public/js/cart.js"?>"></script>