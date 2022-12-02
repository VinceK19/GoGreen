$("div.shopping-box > a").click(function (e) { 
    e.preventDefault();
    $("#billing-info").submit();
});

$("#payment-method > div.custom-radio > input[name='payment_method']").change(function (e) { 
    e.preventDefault();
    if ( $(this).val() == 'Pay on delivery'){
        $("#card-info").hide();
    } else {
        $("#card-info").show();
    }
});