<tr id="product-id-<?= $item["id"]?>">
    <td class="thumbnail-img">
        <a href="#">
    <img class="img-fluid" src="<?= $item["image"]?>" alt="<?= $item["name"]?>" />
</a>
    </td>
    <td class="name-pr">
        <a href="#">
        <?= $item["name"]?>
</a>
    </td>
    <td class="price-pr">
        <p><?=  number_format( $item["price"])?>đ</p>
    </td>
    <td class="quantity-box"><input type="number" name="order-item-<?= $item["order_id"]?>" size="4" value="<?= $item["quantity"]?>" min="0" step="1" class="c-input-text qty text"></td>
    <td class="total-pr">
        <p><?= number_format( $item["total"])?>đ</p>
    </td>
    <td class="remove-pr">
        <a href="<?= BASE_URL."cart/remove_order/".$item["order_id"]?>">
    <i class="fas fa-times"></i>
</a>
    </td>
</tr>