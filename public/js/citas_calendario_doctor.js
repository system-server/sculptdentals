$(document).ready(function(){

    createCalendar();

    $(".btn-disponibilidad").on('click', function(e){
        e.preventDefault();
        if( !$("#quote-date").val() ){
            alert('Seleccione la fecha');
        }else{            
            createCalendar();
        }
    });

    $(".btn-quote-update").on('click', function(e){

        var treatment = $("#quote-edit-treatment").val();
        var observation = $("#quote-edit-observation").val();
        var doctor_id = $("#quote-edit-doctor").val();
        var status = $("#quote-edit-status").val();
        var id = $("#quote-edit-id").val(); 

        var url    = $("#url-update-quote").val();
        var url    = url.replace(":id", id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'put',
            url : url,
            dataType: 'json',
            data: { 
                //observation : observation,
                //treatment : treatment,
                status : status,
            },
            success: function (quote) {
                console.log(quote);
                $("#modal-quote-edit").modal('hide');
                createCalendar();
            },
            error: function (quote) {
                console.log(quote);
            }
        });        

    });

});

function createCalendar(){

    var button_add = `
                        <button class="btn btn-primary btn-xs marco" id=":hour" onclick="addQuote(this.id)">
                          <i class="fa fa-check m-right-xs"></i>
                        </button>       
                        `;   
    var button_edit = `
                        <button class="btn btn-warning btn-xs" id="edit-:edit-id" onclick="editQuote(this.id)">
                          <i class="fa fa-pencil m-right-xs"></i>
                        </button>       
                        `;
    var button_delete = `
                        <button class="btn btn-danger btn-xs" id="delete-:delete-id" onclick="deleteQuote(this.id)">
                          <i class="fa fa-trash m-right-xs"></i>
                        </button>       
                        `;                                           
    var base = `
                <tr>
                  <th scope="row">:hora</th>
                  <td>:fecha</td>
                  <td><a href=":url_show">:customer</a></td>
                  <td>:contract</td>
                  <td>:treatment</td>
                  <td>:observation</td>
                  <td>:doctor</td>
                  <td>
                    <span class="label :label">:status</span>
                  </td>
                  <td>:button</td>
                </tr>
    `;

    var _break = `
                <tr style="background-color:#A5D6A7; color:white">
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Comida</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
    `;    
  
    var _tr = '';
    var _body = '';

    var fecha     = $("#quote-date").val();
    var cus_id    = $("#customer-id").val();
    var doctor_id = $("#doctor-id").val();
    var url       = $("#url-quotes").val();
    var url_cus_show = $("#url-customer-show").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url : url,
        dataType: 'json',
        data: { 
            date : fecha, 
            doctor_id : doctor_id,
        },
        success: function (quotes) {
            $.each(quotes, function(key, quote ){
                if (quote.hour != 'break'){
                    _tr = base.replace(":hora", quote.hour);
                    _tr = _tr.replace(":fecha", quote.date);
                    _tr = _tr.replace(":customer", quote.customer);
                    _tr = _tr.replace(":url_show", url_cus_show.replace(":id", quote.customer_id));
                    _tr = _tr.replace(":contract", quote.customer_id);
                    _tr = _tr.replace(":treatment", quote.treatment ? quote.treatment : '' );
                    _tr = _tr.replace(":observation", quote.observation ? quote.observation : '');                               
                    _tr = _tr.replace(":doctor", quote.doctor);
                    _tr = _tr.replace(":status", quote.status);
                    switch(quote.status){
                        case 'Disponible': _tr = _tr.replace(":label", "label-primary"); break;
                        case 'Reagendo':   _tr = _tr.replace(":label", "label-default"); break;
                        case 'No asistio': _tr = _tr.replace(":label", "label-danger"); break;
                        case 'En espera':  _tr = _tr.replace(":label", "label-info"); break;
                        case 'Atendido':   _tr = _tr.replace(":label", "label-success"); break;
                    }
                    if(quote.customer){
                        _tr = _tr.replace(":button", button_edit);
                        _tr = _tr.replace(":edit-id", quote.quote_id);                   
                    }else{
                        _tr = _tr.replace(":button", '');
                        _tr = _tr.replace(":hour", quote.hour);
                    }                    
                }else{
                    _tr = _break;
                }
                _body = _body + _tr;
            });
            $("#calendar-table").html( _body );
            $("#calendar").show();
        },
        error: function (quotes) {
        }
    });
    
}

function editQuote(id){

    var cus_id = id.split("-");
    $("#quote-edit-id").val(cus_id[1]);
    var url    = $("#url-edit-quote").val();
    var url    = url.replace(":id", cus_id[1]);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url : url,
        dataType: 'json',
        success: function (quote) {
            $("#quote-edit-treatment").val(quote.treatment);
            $("#quote-edit-observation").val(quote.observation);
            $("#quote-edit-doctor").val(quote.doctor_id);
            $("#quote-edit-status").val(quote.status);
        },
        error: function (error) {
            console.log(error);
        }
    });
    $("#modal-quote-edit").modal();
}