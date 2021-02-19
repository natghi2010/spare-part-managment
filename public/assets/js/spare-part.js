$("#vehicle_id").change(function () {

    $("#part_type_container").html('<br/><br/><p>Loading...</p>');
   
    $.get('/transaction/forms/part_type', function (resp) {

        $("#part_type_container").html(resp);


        $("#part_type_id").change(function () {

            $("#part_container").html('<br/><br/><p>Loading...</p>');
           
            $.get('/transaction/forms/part/'+$("#part_type_id").val(), function (resp) {
        
                $("#part_container").html(resp);

                $("#part_id").change(function(){
                    $("#processTransaction").attr('disabled',false);
                })
           
            });
        
        })
        
   
    });

})



