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




$(".deleteUserBtn").click(function(){

    name_of_user = $(this).attr('title');
    //user says okay
    if(confirm("Are you sure you want to delete "+name_of_user+"'s account?")){
        user_id = $(this).attr('id');

        $.get('/user/delete/'+user_id,function(response){
            alert(response);
            location.reload();
        });
    }




})

$(".deletevehicleBtn").click(function(){

    name_of_vehicle = $(this).attr('title');
    //user says okay
    if(confirm("Are you sure you want to delete "+name_of_vehicle+"?")){
        vehicle_id = $(this).attr('id');

        $.get('/vehicles/delete/'+vehicle_id,function(response){
            alert(response);
            location.reload();
        });
    }




})

