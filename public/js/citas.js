$(document).ready(function(){

    var _table = `
                <tr>
                  <th scope="row" style="width:150px">:id</th>
                  <td> <a href=":url_show" id=":col_id">:fullname</a></td>
                  <td style="width:150px">:sex</td>
                  <td style="width:150px">:civil_state</td>
                  <td style="width:20px"><a href="#" class="btn btn-primary btn-xs" id=":cus_id" onclick="createQuote(this.id)"><i class="fa fa-check"></i> Agendar </a></td>
                </tr>
    `;

    $("#search-customer").on('keyup', function (){

        $("#div-busqueda").show();
        $("#div-cliente").hide();
        $("#calendar").hide();

        var name        = $("#search-customer").val();
        var url         = $("#url-serch").val();
        var url_show    = $("#url-customer-show").val();
        
        if(name.trim() != '' && name.length>0){
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
                    name : name,
                },
                success: function (customers) {
                    if(customers.length > 0 ){
                        var _row  = '';
                        var _body = '';
                        $.each(customers, function(key,customer){
                            url_show = url_show.replace(':id', customer.id);
                            _row = _table.replace(':id', customer.id);
                            _row = _row.replace(':col_id', 'col-'+customer.id);
                            _row = _row.replace(':cus_id', 'cus-'+customer.id);
                            _row = _row.replace(':url_show', url_show);
                            _row = _row.replace(':fullname', customer.full_name);
                            _row = _row.replace(':sex', customer.sex);
                            _row = _row.replace(':civil_state', customer.civil_state);
                            _body = _body + _row;
                        });
                        $("#no-results").hide();
                        $("#body-table").html( _body );
                        $("#table-results").show();
                    }else{
                        $("#table-results").hide();
                        $("#no-results").show();
                        $("#no-results").html("No se encontraron resultados con la busqueda");
                    }
                },
                error: function (customers) {
                }
            });
        }else{
            $("#no-results").show();
            $("#no-results").html("Ingrese un nombre en la busqueda");            
        }
    });
  

    $(".btn-disponibilidad").on('click', function(e){
        e.preventDefault();
        if( !$("#quote-date").val() ){
            alert('Fecha');
        }else{            
            createCalendar();
        }
    });

    $(".btn-quote-store").on('click', function(e){

        e.preventDefault();

        var hour         = $("#quote-hour").val();
        var treatment    = $("#quote-treatment").val();
        var observation  = $("#quote-observation").val();
        var fecha        = $("#quote-date").val();
        var cus_id       = $("#customer-id").val();
        var doctor_id    = $("#doctor-id").val();
        var url          = $("#url-store-quote").val();

        console.log(url);

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
                hour : hour,
                date : fecha,
                observation : observation,
                treatment : treatment,
                status : 'EN ESPERA',
                customer_id : cus_id,
                doctor_id : doctor_id,
            },
            success: function (quote) {
                console.log(quote);
                $("#modal-quote-create").modal('hide');
                createCalendar();
            },
            error: function (quote) {
                console.log(quote);
            }
        });

        console.log('ehhhh');
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
                observation : observation,
                treatment : treatment,
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

    $(".btn-quote-delete").on('click', function(e){
        
        var url = $("#url-delete-quote").val();
        var id  = $("#quote-id-delete").val();
        var url = url.replace(":id", id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'delete',
            url : url,
            dataType: 'json',
            success: function (response) {
                $("#modal-quote-delete").modal('hide');
                createCalendar();
            },
            error: function (quote) {
                console.log(quote);
            }
        });         
    });

    $(".clear-calendar").on('change', function(e){
        $("#calendar").hide();
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
                  <td>:customer</td>
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
                        _tr = _tr.replace(":button", button_edit+button_delete);
                        _tr = _tr.replace(":edit-id", quote.quote_id);
                        _tr = _tr.replace(":delete-id", quote.quote_id);                    
                    }else{
                        _tr = _tr.replace(":button", button_add);
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

//show form customer,doctor,date
function createQuote(id){
    //id = cus-21

    $("#div-busqueda").hide();
    $("#div-cliente").show();

    var cus_id = id.split("-"); 
    $("#customer-name").val( $("#col-"+cus_id[1]).html() );
    $("#customer-id").val( cus_id[1] );
    console.log( $("#customer-id").val() );
}

function addQuote(hour){
    $("#quote-hour").val(hour);
    $("#modal-quote-create").modal();
        $("#quote-treatment").val('');
        $("#quote-observation").val('');    
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

function deleteQuote(id){
    var cus_id = id.split("-");
    $("#quote-id-delete").val( cus_id[1] );
    $("#modal-quote-delete").modal();
}