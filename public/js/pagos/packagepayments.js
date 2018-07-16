// with jQuery 
$(document).ready(function(){

    getPackages();

    $(".btn-package-create").on('click', function(e){
        $("#modal-package-create").modal("show");
    });

    $(".btn-package-store").on('click', function(e){
        var package_id = $("#package-id").val();
        var customer_id = $("#customer-id").val();
        var url        = $("#url-package-add").val();

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
                package_id : package_id,
                customer_id : customer_id,
            },
            success: function (response) {
                //console.log(response);
                getPackages();
                $("#modal-package-create").modal("hide");
            },
            error: function (customers) {
            }
        });        
    });

    $(".btn-payment-package-update").on('click', function(e){
        e.preventDefault();
        var description = $("#package-payment-description-edit").val();
        var amount      = $("#package-payment-amount-edit").val();
        var id          = $("#payment-package-id").val();
        var url         = $("#url-payment-package-update").val();
        url             = url.replace(":id", id);

        if( amount.trim() != '' && amount > 0){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'put',
                url : url,
                dataType: 'json',
                data : {
                    amount      : amount,
                    description : description,
                },
                success: function (response) {
                    $("#modal-package-payment-edit").modal('hide');
                    getPackages();
                },
                error: function (customers) {
                }
            });
        }else{
            $("#package-payment-amount-edit").val('').focus();
        }
    });

    $(".btn-payment-package-delete-confirm").on('click', function(e){
        var id  = $("#payment-package-id-delete").val();
        var url = $("#url-payment-package-delete").val();
        url     = url.replace(":id", id);

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
                console.log(response);
                getPackages();
                $("#modal-package-payment-delete").modal('hide');
            },
            error: function (customers) {
            }
        });          

    });

});

$(document).on("click", ".btn-payment-package-edit", function(){
    var id  = $(this).data('edit-id');
    var url = $("#url-payment-package-get").val();
    url     = url.replace(":id", id);

    $("#payment-package-id").val(id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url : url,
        dataType: 'json',
        success: function (payment) {
            $("#package-payment-amount-edit").val( payment.amount );
            $("#package-payment-description-edit").val( payment.description );
            $("#modal-package-payment-edit").modal('show');
        },
        error: function (customers) {
        }
    });

});

$(document).on("click", ".btn-payment-package-delete", function(){
    $("#modal-package-payment-delete").modal('show');
    var id  = $(this).data('delete-id');    
    $("#payment-package-id-delete").val(id);
});

function getPackages(){

    var title = `
                <h1 style="font-size: 20px;margin-bottom:25px">
                    <i class="fa fa-file-text"></i> Pólizas
                </h1>  
    `;

    var base = `
                <div>                               
                  <h1 style="font-size: 15px;">
                    :package
                    <button class="pull-right btn btn-primary btn-xs" id="concept-:id" onclick="addPaymentConcept(this.id)">
                        <i class="fa fa-plus-circle m-right-xs"> </i>  Pago
                    </button>
                  </h1>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Pagos</th>
                        <th style="width:400px">Fecha</th>
                        <th style="width: 25%">Descripción</th>
                        <th style="text-align: right;width:150px">Monto</th>
                        <th style="text-align: right;width:150px">Cubierto</th>
                        <th style="text-align: right;width:150px">Total</th>
                        <th style="text-align: right;width:50px"></th>
                        <th style="text-align: right;width:50px"></th>
                      </tr>
                    </thead>
                    <tbody> 
                     :base_table                             
                    </tbody>
                  </table>
                  
                </div> 
    `;


var table2 = `
<table class="table">
  <thead>
    <tr>
      <th scope="col" style="text-align: right;">Total</th>
      <th scope="col" style="text-align: right;width:150px">Cubierto</th>
      <th scope="col" style="text-align: right;width:150px">Pendiente</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" style="text-align: right;width:150px">1</th>
      <td style="text-align: right;width:150px">Mark</td>
      <td style="text-align: right;width:150px">Otto</td>
    </tr>
  </tbody>
</table>

`;


    var base_table = `
               <tr>
                 <td style="text-align:center">:cont</td>
                 <td>:created_at</td>
                 <td>:description</td>
                 <td style="text-align: right;">$ :amount </td>
                 <td></td>
                 <td></td>
                 <td>
                    <button class="btn btn-default btn-xs btn-payment-package-edit" data-edit-id=":edit-id">
                        <i class="fa fa-edit"></i>
                    </button>
                 </td>
                 <td>
                    <button class="btn btn-default btn-xs btn-payment-package-delete" data-delete-id=":delete-id">
                        <i class="fa fa-trash"></i>
                    </button>
                 </td>
               </tr>
    `;

    var footer_table = `
               <tr>
                 <td></td>
                 <td></td>
                 <td></td>          
                 <td style="text-align: right;"></td>
                 <td style="text-align: right;">$ :cubierto</td>
                 <td style="text-align: right;">$ :total</td>
                 <td></td>
                 <td></td>
               </tr>
    `;

        var package_id = $("#package-id").val();
        var customer_id = $("#customer-id").val();
        var url        = $("#url-package-get").val();

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
                package_id : package_id,
                customer_id : customer_id,
            },
            success: function (packages) {
                
                var _tr ='';
                var _body ='';
                var _tbody = '';
                var _trr='';
                var footer_t = '';
                $.each(packages, function(key, package ){
                    _tr = base.replace(":package", package.name);
                    _tr = _tr.replace(":id", package.id);
                    var cont_ = 1;
                    var cubierto = 0;
                    $.each(package.package_payments , function(key, payment ){
                        _trr = base_table.replace(":amount", payment.amount+'.00');
                        _trr = _trr.replace(":description", (payment.description ? payment.description : '') );
                        _trr = _trr.replace(":created_at", payment.created_at);
                        _trr = _trr.replace(":edit-id", payment.id);
                        _trr = _trr.replace(":delete-id", payment.id);
                        _trr = _trr.replace(":cont", cont_);
                        _tbody = _tbody + _trr;
                        cont_ ++;
                        cubierto = parseInt(cubierto) + parseInt(payment.amount);
                    });
                    _body  = _body + _tr;
                    //_tbody = _tbody + footer_table.replace(':total', package.price + '.00');                   
                    footer_t = footer_table.replace(':total', package.price + '.00');
                    footer_t = footer_t.replace(':cubierto', cubierto + '.00');
                    _tbody = _tbody + footer_t;
                    _body  = _body.replace(":base_table", _tbody);
                    //_body  = _body.replace(":table2", table2);
                    _tbody = '';
                    //_body = _body + _tr;
                });
                if(packages.length > 0){
                    _body = title + _body;
                }
                $("#table-packages").html(_body);
            },
            error: function (customers) {
            }
        });

}


function addPaymentConcept(id){
    var id = id.split("-");
    $("#payment-package-id").val(id[1]);
    console.log(id[1]);

    $("#modal-package-payment").modal("show");
    $("#package-payment-amount").val('');
    $("#package-payment-description").val('');
}

function storePaymentPackage(){
    var package_concept_id = $("#payment-package-id").val();
    var amount             = $("#package-payment-amount").val();
    var description        = $("#package-payment-description").val();
    var url = $("#url-store-payment-package").val();

    if( amount.trim() != '' ){
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
                package_concept_id : package_concept_id,
                amount : amount,
                description : description,
            },
            success: function (response) {
                //console.log(response);
                getPackages();
            },
            error: function (customers) {
            }
        });

        $("#modal-package-payment").modal("hide");
    }else{
        $("#package-payment-amount").val('').focus();
    }
}