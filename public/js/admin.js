(function loadAdmin(){
    $("delete").click(function (e) { 
        e.preventDefault();
        const id = $(this).closest("tr").data("id"),
            table = $(this).closest("table").data("table");
        $.post(`/GoGreen/admin/${table}_delete`, { id },
            function (data) {
                
            },
            "dataType"
        );
    });


    $("#modal button.save").click(function (e) { 
        e.preventDefault();
        console.log('save');
        $("#modal-form").serial;
    });
})()