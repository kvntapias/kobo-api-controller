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
            submission_datatable(response)
        }
    });
}

var subs_table;
function submission_datatable(response){
    var id_form = response.form.id;
    subs_table =  $('#table_submissions').DataTable({
        
        data: response.subs,  // Get the data object
        "bDestroy": true,
        columns: [
            { 'data': '_id' },
            { 'data': 'username' },
            { 'data': 'end' },
            { 'data': "_id", title: 'Action', wrap: true, "render": function (item) { 
                return '<div class="btn-group"><button type="button" onclick="pdf_export(' + id_form + ', '+item+' )" value="0" class="btn btn-sm btn-danger">PDF</button></div>' 
                } 
            }
        ],
        order : [[ 0, "desc" ]]
    });
}

function pdf_export(form_id, submission_id){
    var url_to = public_path + "api_form/"+form_id+"/generar_pdf/"+submission_id;
    window.open(url_to);
    /* $.ajax({
        type: "GET",
        url: public_path + "api_form/"+form_id+"/generar_pdf/"+submission_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response);
        }
    }); */
}