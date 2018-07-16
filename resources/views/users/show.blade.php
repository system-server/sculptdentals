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
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tratamientos" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tratamientos</a>
                    </li>
                    <li role="presentation" class=""><a href="#recetas" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Recetas</a>
                    </li>
                    <li role="presentation" class=""><a href="#evaluaciones" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Evaluaciones</a>
                    </li>
                    <li role="presentation" class=""><a href="#pagos" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Pagos</a>
                    </li>                          
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <!-- tab tratamientos -->
                    @include('users.show._tratamientos')
                    <!-- tab recetas -->
                    @include('users.show._recetas')
                    <!-- tab evaluaciones -->
                    @include('users.show._evaluaciones')
                    <!-- tab evaluaciones -->
                    @include('users.show._pagos')
                  </div>
                </div>
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
  <script src=" {{ asset('js/recetas/recetas.js') }} "></script>
  <script src=" {{ asset('js/quotes.js') }} "></script>
  <script src=" {{ asset('js/customer/show.js') }} "></script>
  <script src=" {{ asset('js/pagos/packagepayments.js') }} "></script>
  <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
  <script src=" {{ asset('js/ckdocument.js') }} "></script>
@endpush
