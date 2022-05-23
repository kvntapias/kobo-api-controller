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
        processing: true,
        serverSide: false,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "dom": "<'row'<'col-sm-6'l>B<'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",      
        buttons: [
        ],
        "scrollX": true,
        "iDisplayLenght": 5,
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
        order : [[ 2, "desc" ]]
    });
}

function pdf_export(form_id, submission_id){
    var url_to = public_path + "api_form/"+form_id+"/generar_pdf/"+submission_id+"/pdf";
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