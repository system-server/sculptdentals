@extends('layouts.template')

@push('styles')
  <link href="{{asset('css/mystyles.css')}}" rel="stylesheet">
@endpush

@section('content')

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <!-- head -->
      <div class="page-title">
        <div class="title_left">
          <h3>Clientes</h3>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Busqueda..." disabled>
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Buscar</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!--/ head -->

      <div class="clearfix"></div>

      <!-- row -->
      <div class="row">
        @if( session('info') )
          <div class="col-md-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><small></small></h2>
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
              <div class="x_content bs-example-popovers">
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  {{ session('info') }}
                </div>
              </div>
            </div>
          </div>              
        @endif
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Detalle <small>Actividad completa del cliente</small></h2>
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
              <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <!-- customer info -->
                @include('users.show.customer_info')
                <!-- /customer info -->
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <!-- end of user-activity-graph -->

              <!--<form action=" {{ route('recipes.update', $recipe->id ) }} " method="put">-->
              {{ Form::model($recipe, ['route'=>['recipes.update', $recipe->id], 'method'=>'put' ]) }}
                <div class="form-group">  
                  <input type="hidden" name="doctor_id" value="{{ Auth::user()->doctor_id }}">
                  <input type="hidden" id="idCustomer" name="customer_id" value="{{ $customer->id }}">
                  {{ Form::select('area_id', $areas, null, ['class' => 'form-control']) }}
                  <!--<select class="form-control" id="idArea" name="area_id" required="on">
                    <option value="">Seleccione &Aacute;rea</option>
                    <option value="1">Endodoncia</option>
                    <option value="2">Pediatria</option>
                    <option value="3">Rehabilitaci&oacute;n</option>
                    <option value="4">Ortodoncia</option>
                  </select>-->
                </div>
                <div style="text-align: right;">
                  <button class="btn btn-warning btn-quote-cancel btn-xs" onclick="irAtras()">
                    <i class="fa fa-tag m-right-sm"></i> Cancelar
                  </button>
                  <div id="btn-oculto">       
                  <button class="btn btn-primary btn-quote-save btn-xs" type="submit">
                    <i class="fa fa-tag m-right-sm"></i> Guardar
                  </button> 
                  </div>     
                </div>
                <div class="container"  id="quote-editor">
                    {{ csrf_field() }}    
                    {{ Form::textarea('recipe', null, ['class' => 'form-control', 'id' => 'editor1']) }}
                </div>
              <!--</form>-->
              {{ Form::close() }}


              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /row -->
    </div>
  </div>
  <!-- /page content -->
@endsection

@push('scripts')
  <script type="text/javascript">
    function irAtras() {
        window.history.back();
    }    
  </script>
  <script src=" {{ asset('js/quotes.js') }} "></script>
  <script src=" {{ asset('js/customer/show.js') }} "></script>
  <script src=" {{ asset('js/pagos/packagepayments.js') }} "></script>
  <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
  <script src=" {{ asset('js/ckdocument.js') }} "></script>
@endpush
