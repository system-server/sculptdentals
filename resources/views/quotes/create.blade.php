@extends('layouts.template')

@push('styles')
  <script src=" {{ asset('js/citas.js') }} "></script>
@endpush

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Cita</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="" name="" id="url-serch" value="{{route('get_customer')}}" hidden>
                    <input type="" name="" id="url-customer-show" value=" {{ route('users.show',':id') }} " hidden>
                    <input type="text" class="form-control" placeholder="Apellidos Nombre" id="search-customer" autofocus="on">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Buscar</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row" id="div-busqueda">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Busqueda <small>Busca un cliente</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="x-content">
                    <p id="no-results" style="display: none"></p>
                    <table class="table table-hover" id="table-results" style="display: none">
                      <thead>
                        <tr>
                          <th style="width:150px">Contrato</th>
                          <th>Nombre</th>
                          <th style="width:150px">Sexo</th>
                          <th style="width:150px">Estado civil</th>
                          <th style="width:20px"></th>
                        </tr>
                      </thead>
                      <tbody id="body-table">

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>

            <div class="row" id="div-cliente" style="display: none">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fecha <small>Seleccione el doctor y la fecha para la cita</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <input type="" name="" id="url-quotes" value="{{route('get_quotes')}}" hidden>
                      <input type="" name="" id="customer-id" value="" hidden>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="customer-name" required="required" class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Doctor <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="doctor-id" name="last-name" required="required" class="form-control col-md-7 col-xs-12 clear-calendar">
                            @foreach($doctors as $doctor)
                              <option value="{{$doctor->id}}"> {{ $doctor->full_name }} </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="quote-date" class="form-control col-md-7 col-xs-12 clear-calendar" required="required" type="date" name="middle-name">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancelar</button>
                          <button type="submit" class="btn btn-success btn-disponibilidad">Ver disponibilidad</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="clearfix"></div>

            <div class="row" id="calendar" style="display: none">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendario <small>Todas las citas del dia</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Hora</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Paciente</th>
                          <th scope="col">Contrato</th>
                          <th scope="col">Tratamiento</th>
                          <th scope="col">Observacion</th>
                          <th scope="col">Doctor</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody id="calendar-table">

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>              
            </div>

            <!-- modal crate quote -->
            <div class="modal fade bs-example-modal-lg" id="modal-quote-create" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <p><h4 class="modal-title" id="myModalLabel">Nueva cita</h4></p>
                    <p><small>Por favor llene los siguientes campos</small></p>
                    <p><small style="color: red; display: none;" id="quote-msg"></small></p>
                  </div>
                  <div class="modal-body">
                  <form id="quote-form" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="" name="" id="url-store-quote" value=" {{ route('quotes.store') }} " hidden>
                    <input type="" name="" id="quote-hour" value="" hidden>                  
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tratamiento <span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <textarea type="text" id="quote-treatment" required="required" class="form-control col-md-7 col-xs-12" rows="1"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Observaciones <span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <textarea type="text" id="quote-observation" required="required" class="form-control col-md-7 col-xs-12" rows="2"></textarea>
                      </div>
                    </div>
                  </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-quote-cancel" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary  btn-quote-store">Guardar cambios</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /modal create quote -->

            <!-- modal edit quote -->
            <div class="modal fade bs-example-modal-lg" id="modal-quote-edit" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <p><h4 class="modal-title" id="myModalLabel">Editar cita</h4></p>
                    <p><small>Por favor llene los siguientes campos</small></p>
                    <p><small style="color: red; display: none;" id="quote-msg"></small></p>
                  </div>
                  <div class="modal-body">
                  <form id="quote-form" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="" name="" id="url-edit-quote" value="{{route('quotes.edit',':id')}}" hidden>
                    <input type="" name="" id="url-update-quote" value="{{route('quotes.update',':id')}}" hidden>
                    <input type="" name="" id="quote-hour" value="" hidden>
                    <input type="" name="" id="quote-edit-id" value="" hidden>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tratamiento <span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <textarea type="text" id="quote-edit-treatment" required="required" class="form-control col-md-7 col-xs-12" rows="1"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Observaciones <span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <textarea type="text" id="quote-edit-observation" required="required" class="form-control col-md-7 col-xs-12" rows="2"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estatus <span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <select type="text" id="quote-edit-status" required="required" class="form-control col-md-7 col-xs-12" rows="3">
                          <option value="REAGENDO" > Reagendo </option>
                          <option value="NO ASISTIO" > No asistio </option>
                          <option value="EN ESPERA" > En espera </option>
                          <option value="ATENDIDO" > Atendido </option>
                        </select>
                      </div>
                    </div>                    
                  </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-quote-cancel" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary  btn-quote-update">Guardar cambios</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /modal edit quote -->

        <!-- modal delete -->
        <div class="modal fade bs-example-modal-sm" id="modal-quote-delete" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Confirmar</h4>
              </div>
              <div class="modal-body" style="text-align: center">
                <p>¿Esta seguro que desea eliminar la cita?</p>
              </div>
              <input type="" id="quote-id-delete" value="" hidden>
              <input type="" name="" id="url-delete-quote" value="{{route('quotes.destroy',':id')}}" hidden>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btn-quote-delete">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /modal delete -->            

          </div>
        </div>
        <!-- /page content -->

@endsection
