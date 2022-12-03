<div class="media mb-2 border-bottom">
    <div class="media-body"> <a href="detail.html"><?= $item["name"]?></a>
        <div class="small text-muted">Price: <?= number_format($item["price"]) ?> đ<span class="mx-2">|</span> Qty: <?= $item["quantity"]?> <span class="mx-2">|</span> Subtotal: <?= number_format($item["quantity"]*$item["price"]) ?> đ</div>
    </div>
</div>