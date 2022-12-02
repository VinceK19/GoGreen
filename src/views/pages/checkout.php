<?php
$cart = $data["cart"];
$user = $_SESSION["user"];
require_once(PATH_COMPONENTS."title-box.php")
?>
<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
    <form id="billing-info" class="needs-validation" method="post" action="<?= BASE_URL."cart/checkout"?>">
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Billing address</h3>
                    </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_mame">First name *</label>
                                <input type="text" class="form-control" name="first_name" placeholder="" value="<?= $user["first_name"]?>" required>
                                <div class="invalid-feedback"> Valid first name is required. </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Last name *</label>
                                <input type="text" class="form-control" name="last_name" placeholder="" value="<?= $user["last_name"]?>" required>
                                <div class="invalid-feedback"> Valid last name is required. </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone *</label>
                            <input type="text" class="form-control" name="phone" placeholder="" value="<?= $user["phone"]?>" required>
                            <div class="invalid-feedback"> Please enter your phone number. </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address *</label>
                            <input type="text" class="form-control" name="address" placeholder="" value="<?= $user["address"]?>" required>
                            <div class="invalid-feedback"> Please enter your shipping address. </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr class="mb-4">
                        <div class="title"> <span>Payment</span> </div>
                        <div id="payment-method" class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="delivery" name="payment_method" type="radio" class="custom-control-input" value="Pay on delivery" checked required>
                                <label class="custom-control-label" for="delivery">Pay on delivery</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="credit" name="payment_method" type="radio" class="custom-control-input" value="Credit card" required>
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="payment_method" type="radio" class="custom-control-input" value="Debit card" required>
                                <label class="custom-control-label" for="debit">Debit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="payment_method" type="radio" class="custom-control-input" value="Paypal" required>
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div id="card-info" style="display: none;">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="card_name">Name on card</label>
                                <input type="text" class="form-control" name="card_name" placeholder="" required style="text-transform:uppercase"> <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback"> Name on card is required </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="card_number">Card number</label>
                                <input type="text" class="form-control" name="card_number" placeholder="" required>
                                <div class="invalid-feedback"> Card number is required </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="expiration">Expiration</label>
                                <input type="text" class="form-control" name="expiration" placeholder="" required>
                                <div class="invalid-feedback"> Expiration date required </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" name="cvv" placeholder="" required>
                                <div class="invalid-feedback"> Security code required </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="payment-icon">
                                    <ul>
                                        <li><img class="img-fluid" src="<?= BASE_URL?>public/images/payment-icon/1.png" alt=""></li>
                                        <li><img class="img-fluid" src="<?= BASE_URL?>public/images/payment-icon/2.png" alt=""></li>
                                        <li><img class="img-fluid" src="<?= BASE_URL?>public/images/payment-icon/3.png" alt=""></li>
                                        <li><img class="img-fluid" src="<?= BASE_URL?>public/images/payment-icon/5.png" alt=""></li>
                                        <li><img class="img-fluid" src="<?= BASE_URL?>public/images/payment-icon/7.png" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        <hr class="mb-1">
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="shipping-method-box">
                            <div class="title-left">
                                <h3>Shipping Method</h3>
                            </div>
                            <div class="mb-4">
                                <div class="custom-control custom-radio">
                                    <input id="shippingOption1" name="shipping_option" class="custom-control-input" checked="checked" type="radio" value="Standard Delivery">
                                    <label class="custom-control-label" for="shippingOption1">Standard Delivery</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                <div class="custom-control custom-radio">
                                    <input id="shippingOption2" name="shipping_option" class="custom-control-input" type="radio" value="Express Delivery">
                                    <label class="custom-control-label" for="shippingOption2">Express Delivery</label> <span class="float-right font-weight-bold">10,000 đ</span> </div>
                                <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                <div class="custom-control custom-radio">
                                    <input id="shippingOption3" name="shipping_option" class="custom-control-input" type="radio" value="Next Business day">
                                    <label class="custom-control-label" for="shippingOption3">Next Business day</label> <span class="float-right font-weight-bold">20,000 đ</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="odr-box">
                            <div class="title-left">
                                <h3>Shopping cart</h3>
                            </div>
                            <div class="rounded p-2 bg-light">
                                <?php foreach ($cart as $item) {
                                    require(PATH_COMPONENTS . "checkout-item.php");
                                }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Your order</h3>
                            </div>
                            <div class="d-flex">
                                <div class="font-weight-bold">Product</div>
                                <div class="ml-auto font-weight-bold">Total</div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Sub Total</h4>
                                <div class="ml-auto font-weight-bold"><?= number_format($data["sub_total"]) ?> đ</div>
                            </div>
                            <div class="d-flex">
                                <h4>Discount</h4>
                                <div class="ml-auto font-weight-bold"> 0 đ</div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Coupon Discount</h4>
                                <div class="ml-auto font-weight-bold"> 0 đ </div>
                            </div>
                            <div class="d-flex">
                                <h4>Tax</h4>
                                <div class="ml-auto font-weight-bold"> <?= number_format($data["tax"]) ?> đ</div>
                            </div>
                            <div class="d-flex">
                                <h4>Shipping Cost</h4>
                                <div class="ml-auto font-weight-bold"> Free </div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5"> <?= number_format($data["total"]) ?> đ</div>
                            </div>
                            <hr> </div>
                    </div>
                    <div class="col-12 d-flex shopping-box"> <a href="#" class="ml-auto btn hvr-hover">Place Order</a> </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
<!-- End Cart -->
<script src="<?= BASE_URL."public/js/checkout.js"?>"></script>