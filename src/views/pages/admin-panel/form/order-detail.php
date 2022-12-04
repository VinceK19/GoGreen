
<?php
$item = $data["item"];
$orders = $data["orders"];
require_once(PATH_PAGES . "admin-panel/header.php")
?>
<div class="container mt-4">
    <div class="title-all">
        <h1>Order detail</h1>
    </div>
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
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) {?>
                    <tr data-id="<?= $order["id"]?>">
                        <td><?= $order["id"]?></td>
                        <td><img class="img-thumbnail" src="<?= $order["image"]?>" alt="<?= $order["name"]?>" style="width:100px;"></td>
                        <td><?= $order["name"]?></td>
                        <td><?= number_format($order["price"]) ?> đ</td>
                        <td><?= $order["quantity"]?></td>
                        <td><?= number_format($order["total"]) ?> đ</td>
                        <td><?= $order["status"]?></td>
                        
                        <td>
                            <a class="edit btn btn-outline-success" href="<?= BASE_URL."admin/confirm_order/".$order["id"]?>"><i class="fa fa-check"></i></a>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
    
</div>