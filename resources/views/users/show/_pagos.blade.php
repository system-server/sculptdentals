

  <div role="tabpanel" class="tab-pane fade" id="pagos" aria-labelledby="profile-tab">
    <!-- paquetes -->
    <div style="margin-top: 30px">
      <div style="text-align: right;">
          <button class="btn btn-default btn-xs btn-package-create">
            <i class="fa fa-plus-circle m-right-xs"></i> Póliza
          </button>
      </div>
      <div id="table-packages" style="margin-top: 0px">
      </div>                                   
    </div>
    <!--/ paquetes -->
    <!-- tratamientos -->
    <div style="margin-top: 40px; display: none" id="table-treatment-price">
      <h1 style="font-size: 20px;">
          <i class="fa fa-user-md"></i> Tratamientos
      </h1>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Fecha</th>
            <th style="width: 50%">Tratamiento</th>
            <th style="text-align: right;">Precio</th>
          </tr>
        </thead>
        <tbody id="table-payment-treatment">                             
        </tbody>
      </table>                                                     
    </div>
    <!--/ tratamientos -->
  </div>

  <!-- modal create package -->
  <div class="modal fade bs-example-modal-lg" id="modal-package-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <p><h4 class="modal-title" id="myModalLabel">Agregar póliza</h4></p>
          <p><small>Seleccione una póliza</small></p>
          <p><small style="color: red; display: none;" id="treatment-msg"></small></p>
        </div>
        <div class="modal-body">
        <form id="treatment-form" data-parsley-validate class="form-horizontal form-label-left">
          <input type="" id="customer-id" value=" {{ $customer->id }} " hidden>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Póliza <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <select type="text" id="package-id" required="required" class="form-control col-md-7 col-xs-12" rows="3">
                @foreach($packages as $package)
                  <option value=" {{ $package->id }} " > {{ $package->name }} </option>
                @endforeach
              </select>
            </div>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <input type="" id="url-package-add" value=" {{route('add_package')}} " hidden>
          <input type="" id="url-package-get" value=" {{route('get_packages')}} " hidden>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary  btn-package-store">Agregar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /modal create package -->

  <!-- modal create payment package -->
  <div class="modal fade bs-example-modal-lg" id="modal-package-payment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <p><h4 class="modal-title" id="myModalLabel">Nuevo pago</h4></p>
          <p><small>Agrega la informacion del monto</small></p>
          <p><small style="color: red; display: none;" id="treatment-msg"></small></p>
        </div>
        <div class="modal-body">
        <form id="treatment-form" data-parsley-validate class="form-horizontal form-label-left">
          <input type="" id="customer-id" value=" {{ $customer->id }} " hidden>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Monto <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="number" id="package-payment-amount" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripción
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <textarea type="text" id="package-payment-description" required="required" class="form-control col-md-7 col-xs-12" rows="3"></textarea>
            </div>
          </div>                
        </form>
        </div>
        <div class="modal-footer">
          <input type="" id="payment-package-id" hidden>
          <input type="" id="url-package-add" value=" {{route('add_package')}} " hidden>
          <input type="" id="url-package-get" value=" {{route('get_packages')}} " hidden>
          <input type="" id="url-store-payment-package" value=" {{route('store_payment_package')}} " hidden>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="storePaymentPackage()">Agregar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /modal create payment package -->

  <!-- modal edit payment package -->
  <div class="modal fade bs-example-modal-lg" id="modal-package-payment-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <p><h4 class="modal-title" id="myModalLabel">Editar pago</h4></p>
          <p><small>Agrega la informacion del pago</small></p>
          <p><small style="color: red; display: none;" id="treatment-msg"></small></p>
        </div>
        <div class="modal-body">
        <form id="treatment-form" data-parsley-validate class="form-horizontal form-label-left">
          <input type="" id="customer-id" value=" {{ $customer->id }} " hidden>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Monto <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="number" id="package-payment-amount-edit" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripción
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <textarea type="text" id="package-payment-description-edit" required="required" class="form-control col-md-7 col-xs-12" rows="3"></textarea>
            </div>
          </div>                
        </form>
        </div>
        <div class="modal-footer">
          <input type="text" id="payment-package-id" hidden>
          <input type="text" id="url-payment-package-get" value=" {{route('get_payment_package',':id')}} " hidden>
          <input type="text" id="url-payment-package-update" value=" {{route('update_payment_package',':id')}} " hidden>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary btn-payment-package-update">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /modal edit payment package -->

  <!-- modal delete -->
  <div class="modal fade bs-example-modal-sm" id="modal-package-payment-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Confirmar</h4>
        </div>
        <div class="modal-body" style="text-align: center">
          <p>¿Esta seguro que desea eliminar el pago?</p>
        </div>
        <input type="" id="payment-package-id-delete" hidden>
        <input type="" id="url-payment-package-delete" value=" {{route('delete_payment_package',':id')}} " hidden>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger btn-payment-package-delete-confirm">Eliminar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /modal delete -->  