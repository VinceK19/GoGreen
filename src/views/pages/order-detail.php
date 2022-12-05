<?php  
require_once PATH_COMPONENTS . "title-box.php";
$item = $data["item"];
$orders = $data["orders"];
$_status = [
    "",
    "<i class='fa fa-file' style='color:red'>Newly place</i>",
    "<i class='fa fa-check' style='color:green'>Order Confirmed<i/>",
];
?>
<div class="container mt-4">
    <div class="title-all">
        <h1>Order detail</h1>
    </div>
    <h1><b>Billing Info</b></h1>
    <div class="row">
        <div class="col-md-4">
            <p>First Name: <b><?= $item["first_name"]?></b></p>
        </div>
        <div class="col-md-4">
            <p>Last Name: <b><?= $item["last_name"]?></b></p>
        </div>
        <div class="col-md-4">
            <p>Phone: <b>0<?= $item["phone"]?></b></p>
        </div>
        <div class="col-md-12">
            <p>Address: <b>0<?= $item["address"]?></b></p>
        </div>
        <div class="col-md-4">
            <p>Payment Method: <b><?= $item["payment_method"]?></b></p>
        </div>
        <div class="col-md-4">
            <p>Shipping Option: <b><?= $item["shipping_option"]?></b></p>
        </div>
    </div>
    <div class="order-table mt-3">
        <h1><b>Items</b></h1>
        <table id="main-table" class="table table-striped table-bordered table-hover" data-table="product">
            <thead class="thead-secondary">
                <th style="white-space: nowrap">Id</th>
                <th style="white-space: nowrap">Image</th>
                <th style="white-space: nowrap">Name</th>
                <th style="white-space: nowrap">Price</th>
                <th style="white-space: nowrap">Quantity</th>
                <th style="white-space: nowrap">Total</th>
                <th style="white-space: nowrap">Status</th>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) {?>
                    <tr data-id="<?= $order["id"]?>">
                        <td style="white-space: nowrap"><?= $order["id"]?></td>
                        <td style="white-space: nowrap"><img class="img-thumbnail" src="<?= $order["image"]?>" alt="<?= $order["name"]?>" style="width:100px;"></td>
                        <td style="white-space: nowrap"><?= $order["name"]?></td>
                        <td style="white-space: nowrap"><?= number_format($order["price"]) ?> đ</td>
                        <td style="white-space: nowrap"><?= $order["quantity"]?></td>
                        <td style="white-space: nowrap"><?= number_format($order["total"]) ?> đ</td>
                        <td style="white-space: nowrap"><?= $_status[$order["status"]]?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
    
</div>