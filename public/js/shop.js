$("#addToCart").click(function (e) { 
    e.preventDefault();
    const product_id = $(".shop-detail-box-main").data("product-id"),
        quantity = $("#quantity").val();
    $.post("/GoGreen/cart/add_order", { product_id, quantity },
        function (data) {
            $(".badge").html(data.reduce( (res, item) => res + Number(item.quantity), 0));
        },
        "json"
    );
});

$("#submit-comment").click(function (e) { 
    e.preventDefault();
    $("#leave-comment").submit();
});

$("#leave-comment").submit(function (e) { 
    e.preventDefault();
    const form = $(this).serializeArray(),
        product_id = $(".shop-detail-box-main").data("product-id"),
        data = {};
    form.forEach(item => {
        data[ item.name ] = item.value;
    });
    $.post("/GoGreen/shop/post_comment", {...data, product_id},
        function (data) {
            if (data.error){
                console.error("POST: ",data.error)
            } else {
                $("#review-section").parent().html(data);
            }
        },
        "html"
    );
});