@extends('layouts.template')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
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

            <div class="clearfix"></div>

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
                    <h2>Lista completa <small>Detalle de todos los clientes</small></h2>
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

                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Contrato</th>
                          <th>Nombre</th>
                          <th>Sexo</th>
                          @can('users.edit') <th style="width: 5px"></th> @endcan
                          @can('users.destroy') <th style="width: 5px"></th> @endcan
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($customers as $customer)
                        <tr>
                          <th scope="row"> {{ $customer->id }} </th>
                          <td> <a href=" {{ route('users.show', $customer->id) }} "> {{ $customer->full_name }} </a> </td>
                          <td> 
                            @if( $customer->sex == 'MASCULINO' )
                              Masculino
                            @else
                              Femenino
                            @endif
                          </td>
                          @can('users.edit')
                            <td>  
                              <a href=" {{ route('users.edit', $customer->id) }} " class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar </a>
                            </td>
                          @endcan
                          @can('users.destroy')
                            <td>  
                              {{ Form::open( ['route'=>['users.destroy', $customer->id], 'method'=>'delete', 'id'=>'form-'.$customer->id] ) }}
                                <button type="submit" class="btn btn-danger btn-xs btn-delete" data-toggle="modal" data-target=".bs-example-modal-sm">
                                  <i class="fa fa-trash"></i> Eliminar
                                </button>
                              {{ Form::close() }}
                            </td>
                          @endcan            
                        </tr>                        
                        @endforeach

                      </tbody>
                    </table>
                    <div style="text-align: center;">
                      {{ $customers->links() }}
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->




                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2"></h4>
                        </div>
                        <div class="modal-body">
                          <input type="" name="" id="form-id" hidden>
                          <h4>Confirmar</h4>
                          <p>
                            ¿Esta seguro que desea eliminar el cliente?
                          </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-danger confirm-delete">Eliminar</button>
                        </div>

                      </div>
                    </div>
                  </div>

<script type="text/javascript">
  $(document).ready(function(){

      $(".btn-delete").click(function(e){
          
          e.preventDefault();

          var form    = $(this).parents('form');
          var form_id = form.attr('id');

          $("#form-id").val(form_id);

      });

      $(".confirm-delete").click(function(e){
          
          var form_id = $("#form-id").val();

          $("#"+form_id).submit();

      });      
  });  
</script>

@endsection
