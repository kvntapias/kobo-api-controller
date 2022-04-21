$(document).ready(function () {
    
});


function listar_submisions(form_id){
    $.ajax({
        type: "GET",
        url: public_path + "api_form/listar_submissions",
        data: {form_id},
        dataType: "json",
        success: function (response) {
            console.log(response);
        }
    });
}