(function loadListener(){
    $("tr.cart-item > td.remove-pr > a").click(function (e) { 
        e.preventDefault();
        const order_id = $(this).closest('tr.cart-item').data("order-id");
        $.post("cart/remove_order", { order_id },
            function (data) {
                $("#cart-table").parent().html(data);
                loadListener();
            },
            "html"
        );
    }); 
    $("tr.cart-item > td.quantity-box > input").change(function (e) {
        e.preventDefault();
        const formater = new Intl.NumberFormat(),
            val = $(this).val(),
            order_id = $(this).closest('tr.cart-item').data("order-id"),
            price = $(`#order-id-${order_id} > td.price-pr > p`).html().replace(',','').split(' ')[0];
        $(`#order-id-${order_id} > td.total-pr > p`).html(`${formater.format(Number(price)*val)} đ`);    
    });
    
    $("#cart-table").submit(function (e) { 
        e.preventDefault();
        const data = $(this).serializeArray();
        $.post("cart/update_cart", {data},
            function (data) {
                $('#order-box').parent().html(data);
            },
            "html"
        );
    });
})();

