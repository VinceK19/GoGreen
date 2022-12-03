<?php ?>
<div id="order-box" class="order-box">
    <h3>Order summary</h3>
    <div class="d-flex">
        <h4>Sub Total</h4>
        <div class="ml-auto font-weight-bold"> <?= number_format( $data["sub_total"])?>đ</div>
    </div>
    <div class="d-flex">
        <h4>Discount</h4>
        <div class="ml-auto font-weight-bold"> 0 đ </div>
    </div>
    <hr class="my-1">
    <div class="d-flex">
        <h4>Coupon Discount</h4>
        <div class="ml-auto font-weight-bold"> 0 đ </div>
    </div>
    <div class="d-flex">
        <h4>Tax</h4>
        <div class="ml-auto font-weight-bold"> <?= $data["tax"]?>đ </div>
    </div>
    <div class="d-flex">
        <h4>Shipping Cost</h4>
        <div class="ml-auto font-weight-bold"> Free </div>
    </div>
    <hr>
    <div class="d-flex gr-total">
        <h5>Grand Total</h5>
        <div id="grand-price" class="ml-auto h5"> <?= number_format( $data["total"])?> </div>
    </div>
    <hr> </div>