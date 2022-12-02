function addToCart(product_id){    
    $.post("/GoGreen/cart/add_order", { product_id },
        function (data) {
            $(".badge").html(data.reduce( (res, item) => res + Number(item.quantity), 0));
        },
        "json"
    );
}