<?php $cart = $data["cart"];?>
<form id="cart-table">
    <table class="table">
        <thead>
            <tr>
                <th>Images</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($cart)){
                foreach($cart as $item){
                    include PATH_COMPONENTS."cart-item.php";
                }
            } else { ?>
                <tr><td colspan="6"><h2>Cart is empty</h2></td></tr>
            <?php }?>
        </tbody>
    </table>
</form>