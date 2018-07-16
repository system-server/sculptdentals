

  <div role="tabpanel" class="tab-pane fade active in" id="tratamientos" aria-labelledby="home-tab">
    <!-- start recent activity -->
    <ul class="list-unstyled timeline">
      <!-- Add treatment -->
      <div class="alert alert-success alert-dismissible fade in" role="alert" id="treatment-alert" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <p id="treatment-response"></p>
      </div>                              
      <div style="text-align: right;">
        <input type="" name="" id="url-treatments-store" value="{{ route("treatments.store") }}" hidden>
        <input type="" name="" id="url-treatments-index" value="{{ route("treatments.index") }}" hidden>
        <input type="" name="" id="url-treatments-edit" value="{{ route("treatments.edit", ":id") }}" hidden>
        <input type="" name="" id="url-treatments-update" value="{{ route("treatments.update", ":id") }}" hidden> 
        <input type="" name="" id="url-treatments-destroy" value="{{ route("treatments.destroy", ":id") }}" hidden>
        @can('treatments.create')
          <button class="btn btn-default btn-xs btn-treatment-add">
            <i class="fa fa-plus-circle m-right-xs"></i>
          </button>
        @endcan
      </div>
      <div id="treatments-all">                              
      </div>
    </ul>
    <!-- end recent activity -->
  </div>

  <!-- modal crate treatment -->
  <div class="modal fade bs-example-modal-lg" id="modal-treatment-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <p><h4 class="modal-title" id="myModalLabel">Nuevo tratamiento</h4></p>
          <p><small>Los campos marcados con * son obligatorios</small></p>
          <p><small style="color: red; display: none;" id="treatment-msg"></small></p>
        </div>
        <div class="modal-body">
        <form id="treatment-form" data-parsley-validate class="form-horizontal form-label-left">
          <input type="" id="treatment-customer" value=" {{ $customer->id }} " hidden>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tratamiento <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <select type="text" id="treatment-service" required="required" class="form-control col-md-7 col-xs-12" rows="3">
                @foreach($services as $service)
                  <option value=" {{ $service->id }} " > {{ $service->name }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Diagnóstico <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <textarea type="text" id="treatment-diagnostic" required="required" class="form-control col-md-7 col-xs-12" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Observaciones <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <textarea type="text" id="treatment-observations" required="required" class="form-control col-md-7 col-xs-12" rows="5"></textarea>
            </div>
          </div>                          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del asistente
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="text" id="treatment-assistant" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-treatment-cancel" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary  btn-treatment-save">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /modal create treatment -->

  <!-- modal edit treatment -->
  <div class="modal fade bs-example-modal-lg" id="modal-treatment-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <p><h4 class="modal-title" id="myModalLabel">Editar tratamiento</h4></p>
          <p><small>Los campos marcados con * son obligatorios</small></p>
          <p><small style="color: red; display: none;" id="treatment-msg-edit"></small></p>
        </div>
        <div class="modal-body">
        <form id="treatment-form-edit" data-parsley-validate class="form-horizontal form-label-left">
          <input type="" id="treatment-id" value="" hidden>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tratamiento <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <select type="text" id="treatment-service-edit" required="required" class="form-control col-md-7 col-xs-12" rows="3">
                @foreach($services as $service)
                  <option value="{{$service->id}}" > {{ $service->name }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Diagnóstico <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <textarea type="text" id="treatment-diagnostic-edit" required="required" class="form-control col-md-7 col-xs-12" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Observaciones <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <textarea type="text" id="treatment-observations-edit" required="required" class="form-control col-md-7 col-xs-12" rows="5"></textarea>
            </div>
          </div>                          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del asistente
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="text" id="treatment-assistant-edit" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-treatment-cancel" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary  btn-treatment-update">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /modal edit -->

  <!-- modal delete -->
  <div class="modal fade bs-example-modal-sm" id="modal-treatment-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Confirmar</h4>
        </div>
        <div class="modal-body" style="text-align: center">
          <p>¿Esta seguro que desea eliminar el tratamiento?</p>
        </div>
        <input type="" id="treatment-id-delete" value="" hidden>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger btn-treatment-delete">Eliminar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /modal delete -->