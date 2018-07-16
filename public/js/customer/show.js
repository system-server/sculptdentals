$(document).ready(function() {

  showTreatments();


  //cancelar modal
  $(".btn-treatment-cancel").on('click', function (e){
    showTreatments();
  });

  //show modal
  $(".btn-treatment-add").on('click', function (e){
    e.preventDefault();
    $("#modal-treatment-create").modal();
    $("#treatment-msg").hide();
    $("#treatment-alert").hide();

    $("#treatment-diagnostic").val('');
    $("#treatment-observations").val('');
    $("#treatment-assistant").val('');
  });

  //add treatment
  $(".btn-treatment-save").on('click', function (e){

    e.preventDefault();
    $("#modal-treatment-create").modal();
    $("#treatment-alert").hide();    

    if( $("#treatment-diagnostic").val().trim() == '' || $("#treatment-observations").val().trim() == '' ){
      $("#treatment-msg").show();
      $("#treatment-msg").html('Por favor llena los campos obligatorios.');
    }else{     

      var url = $("#url-treatments-store").val();

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      $.ajax({
        type: 'post',
        url: url,
        data:{
          'diagnostic'      : $("#treatment-diagnostic").val(),
          'observations'    : $("#treatment-observations").val(),
          'assistant_name'  : $("#treatment-assistant").val(),
          'service_id'      : $("#treatment-service").val(),
          'customer_id'     : $("#treatment-customer").val(),
        },
        //dataType: 'json',
        success: function (response) {
          $("#modal-treatment-create").modal('hide');
          $("#treatment-alert").show();
          $("#treatment-response").html( response.msg );
          showTreatments();
        }
      });
    }

    console.log("se agrego nuevo tratamiento");

  });

  //update treatment
  $(".btn-treatment-update").on('click', function (e){



    e.preventDefault();

    if( $("#treatment-diagnostic-edit").val().trim() == '' || $("#treatment-observations-edit").val().trim() == '' ){
      $("#treatment-msg-edit").show();
      $("#treatment-msg-edit").html('Por favor llena los campos obligatorios.');
    }else{     

      var id = $("#treatment-id").val();
      var url = $("#url-treatments-update").val();
      url     = url.replace(':id', id);

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      $.ajax({
        type: 'put',
        url: url,
        data:{
          'diagnostic'      : $("#treatment-diagnostic-edit").val(),
          'observations'    : $("#treatment-observations-edit").val(),
          'assistant_name'  : $("#treatment-assistant-edit").val(),
          'service_id'      : $("#treatment-service-edit").val(),
          'customer_id'     : $("#treatment-customer-edit").val(),
        },
        dataType: 'json',
        success: function (response) {
          $("#modal-treatment-edit").modal('hide');
          $("#treatment-alert").show();
          $("#treatment-response").html( response.msg );
          showTreatments();
        }
      });
    }

  });  

  //delete treatment
  $(".btn-treatment-delete").on('click', function (e){

    var id = $("#treatment-id-delete").val();
    var url = $("#url-treatments-destroy").val();
    url     = url.replace(':id', id);    

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $.ajax({
      type: 'delete',
      url: url,
      data:{
      },
      dataType: 'json',
      success: function (response) {
        $("#modal-treatment-delete").modal('hide');
        $("#treatment-alert").show();
        $("#treatment-response").html( response.msg );
        showTreatments();
      }
    });

  });  

});


  function editTreatment(id){

    $("#treatment-alert").hide();

    $("#modal-treatment-edit").modal();

    var url = $("#url-treatments-edit").val();
    url     = url.replace(':id', id);

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });    
    $.ajax({
      type: 'get',
      url: url,
      dataType: 'json',
      success: function (treatment) {
        console.log( treatment );
        $("#treatment-diagnostic-edit").val(treatment.diagnostic);
        $("#treatment-observations-edit").val(treatment.observations);
        $("#treatment-assistant-edit").val(treatment.assistant_name);
        $("#treatment-service-edit").val(treatment.service_id);
        $("#treatment-id").val(treatment.id);
      }
    });    
  }
  

  function deleteTreatment(id){
    $("#treatment-alert").hide();
    $("#treatment-id-delete").val(id);
    $("#modal-treatment-delete").modal();
  }

  function showTreatments(){

    var base = `
            <li>
              <div class="block">
                <div class="tags">
                  <a href="" class="tag">
                    <span>Tratamiento</span>
                  </a>
                </div>
                <div class="block_content">
                  <h2 class="title">
                    <a> :treatment </a>
                  </h2>
                  <br>
                  Diagnostico
                  <p class="excerpt"> :diagnostic
                  </p>
                  Observaciones
                  <p class="excerpt"> :observations
                  </p>
                  <div class="byline">
                    <span>:date</span> por <a>:doctor</a> :assistant
                  </div> 
                  <div style="text-align: right;">
                      <button class="btn btn-default btn-xs" onclick="editTreatment(this.id)" id="edit-:id">
                        <i class="fa fa-pencil m-right-xs"></i>
                      </button>
                      <button class="btn btn-default btn-xs" onclick="deleteTreatment(this.id)" id="del-:id_del">
                        <i class="fa fa-trash m-right-xs"></i>
                      </button>
                  </div>                                                                           
                </div>
              </div>
            </li> 
    `;

    var base3333 = `
            <li>
              <div class="block">
                <div class="tags">
                  <a href="" class="tag">
                    <span>Tratamiento</span>
                  </a>
                </div>
                <div class="block_content">
                  <h2 class="title">
                    <a> :treatment </a>
                  </h2>
                  <br>
                  Diagnostico
                  <p class="excerpt"> :diagnostic
                  </p>
                  Observaciones
                  <p class="excerpt"> :observations
                  </p>
                  <div class="byline">
                    <span>:date</span> por <a>:doctor</a> :assistant
                  </div> 
                  <div style="text-align: right;">
                    @can('treatments.edit')
                      <button class="btn btn-default btn-xs" onclick="editTreatment(this.id)" id="edit-:id">
                        <i class="fa fa-pencil m-right-xs"></i>
                      </button>
                    @endcan
                    @can('treatments.destroy')
                      <button class="btn btn-default btn-xs" onclick="deleteTreatment(this.id)" id="del-:id_del">
                        <i class="fa fa-trash m-right-xs"></i>
                      </button>
                    @endcan
                  </div>                                                                           
                </div>
              </div>
            </li> 
    `;

    var base_pay = `
                    <tr>
                      <td>:cont</td>
                      <td>:created_at</td>
                      <td>:name</td>
                      <td style="text-align: right;">$ :price</td>
                    </tr>   
    `;

      var url = $("#url-treatments-index").val();

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      $.ajax({
        type: 'get',
        url: url,
        data:{
          'customer_id'     : $("#treatment-customer").val(),
        },
        //dataType: 'json',
        success: function (response) {
          var html = '';
          var html_pay = '';
          var cont = 1;
          if(response.length > 0){
            $.each( response, function(index, treatment){
              //tratamientos
              li = base.replace(':date',       treatment.updated_at);
              li = li.replace(':doctor',       treatment.doctor.full_name);             
              li = li.replace(':treatment',    treatment.service.name); 
              li = li.replace(':diagnostic',   treatment.diagnostic); 
              li = li.replace(':observations', treatment.observations);
              li = li.replace(':assistant',    treatment.assistant_name ? 'asistio <a>' + treatment.assistant_name + '</a>' : '');
              li = li.replace(':id',treatment.id);
              li = li.replace(':id_del',treatment.id);
              html = html + li;
              //pagos de tratamientos
              lp = base_pay.replace(':created_at',treatment.created_at);
              lp = lp.replace(':cont',cont);
              lp = lp.replace(':name', treatment.service.name);             
              lp = lp.replace(':price', treatment.price);
              html_pay = html_pay + lp;
              cont++;
            });
            $("#treatments-all").html( html );
            $("#table-payment-treatment").html( html_pay );
            $("#table-treatment-price").show();
          }else{
            $("#treatments-all").html( html );
            $("#treatment-alert").show();
            $("#treatment-response").html( response.msg );
            $("#table-treatment-price").hide();
          }

        }
      });
  }
