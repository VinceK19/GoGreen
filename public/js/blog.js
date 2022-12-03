$("#submit-comment").click(function (e) { 
    e.preventDefault();
    $("#leave-comment").submit();
});

$("#leave-comment").submit(function (e) { 
    e.preventDefault();
    const form = $(this).serializeArray(),
        blog_id = $("#blog-main").data("blog-id"),
        data = {};
    form.forEach(item => {
        data[ item.name ] = item.value;
    });
    $.post("/GoGreen/blog/post_comment", {...data, blog_id},
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