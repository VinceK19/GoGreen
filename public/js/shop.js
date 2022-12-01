function addToCart(product_id){    
    $.post("/GoGreen/cart/add_order", { product_id },
        function (data) {
            console.log(data);
        },
        "json"
    );
}