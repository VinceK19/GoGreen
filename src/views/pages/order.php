<div class="container mt-5 mb-5">
<div class="title-all">
    <h1>My Order</h1>
</div>
<table id="main-table" class="table table-striped table-bordered table-hover" data-table="product">
        <thead class="thead-secondary">
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Payment Method</th>
            <th>Shipping Option</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($data["items"] as $item) {?>
                <tr data-id="<?= $item["id"]?>">
                    <td><?= $item["id"]?></td>
                    <td><?= $item["first_name"]?></td>
                    <td><?= $item["last_name"]?></td>
                    <td><?= $item["phone"]?></td>
                    <td><?= $item["address"]?></td>
                    <td><?= $item["payment_method"]?></td>
                    <td><?= $item["shipping_option"]?></td>
                    <td>
                        <a class="edit btn btn-outline-info" href="<?= BASE_URL."account/order/".$item["id"]?>"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
</table>
    
</div>