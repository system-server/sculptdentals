@extends('layouts.template')

@push('styles')
  <link href="{{asset('css/mystyles.css')}}" rel="stylesheet">
@endpush

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
                    <div class="col-md-12">
                    <div class="container"  id="quote-editor">
                                {{ csrf_field() }}    
                                <textarea id="editor1" name="editor">
                                   <h2 style="text-align:center"><span style="font-size:26px">Sculp Dental</span></h2>
                                    
                                    <p style="text-align:center"><span style="color:#007ac9"><strong>Cirujano Dentista</strong></span></p>
                                    
                                    <p style="text-align:right"><em><span style="color:null">Folio: {{$recipe[0]->id}}</span></em></p>
                                    
                                    <p><strong><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Dr. {{$doctor->full_name}}</span></strong><br />
                                    <span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">{{$doctor->university}}<br />
                                    {{$doctor->speciality}}</span><span style="font-family:&quot;Lucida Sans Unicode&quot;,&quot;Lucida Grande&quot;,sans-serif">Ced. Profe: {{$doctor->professional_card}}</span>
                                    
                                    <p><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Domicilio: Avenida Estaci&oacute;n Central,&nbsp;Misiones de San Francisco.</span></p>
                                    
                                    <p style="text-align:right"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Fecha: {{$recipe[0]->date}}</span></p>
                                    
                                    <p style="text-align:center"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">{{$customer->full_name}}</span></p>
                                    
                                    <table cellpadding="15" cellspacing="0" class="schedule" style="border-collapse:collapse; width:100%">
                                    <thead>
                                    <tr>
                                    <th scope="col" style="background-color:#f2f9ff; text-align:center">N&deg;</th>
                                    <th scope="col" style="background-color:#f2f9ff; text-align:center"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">D. Distintiva</span>
                                    <th scope="col" style="background-color:#f2f9ff; text-align:center"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">D. Gen&eacute;rico</span>
                                    <th scope="col" style="background-color:#f2f9ff; text-align:center"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Farmac&eacute;utico</span>
                                    <th scope="col" style="background-color:#f2f9ff; text-align:center"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Presentaci&oacute;n</span>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <td style="text-align:center; white-space:nowrap">1</td>
                                    <td style="text-align:center; white-space:nowrap"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Paracetamol</span></td>
                                    <td style="text-align:center; white-space:nowrap"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Brumo de&nbsp;</span></td>
                                    <td style="text-align:center; white-space:nowrap"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Tab</span></td>
                                    <td style="text-align:center"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">100 grm.</span></td>
                                    </tr>
                                    <tr>
                                    <td style="text-align:center; white-space:nowrap">&nbsp;</td>
                                    <td style="text-align:center; white-space:nowrap">&nbsp;</td>
                                    <td style="text-align:center; white-space:nowrap"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">1 tab. cada 8 Hrs</span></td>
                                    <td style="text-align:center; white-space:nowrap"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Durante 3 Meses</span></td>
                                    <td style="text-align:center">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <table align="right" border="0" cellpadding="0" cellspacing="0" style="width:300px">
                                    <tbody>
                                    <tr>
                                    <td style="text-align:center"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif"><u>Dr. {{$doctor->full_name}}</u><br />
                                    <strong>Firma</strong></span></td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    
                                    <p style="text-align:center">&nbsp;</p>
                                    
                                    <p style="text-align:center">&nbsp;</p>
                                </textarea>    
                            </div> 
                  </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->


 
        <!-- /modal create treatment -->

        <!-- modal edit treatment -->
        
        <!-- /modal edit -->

        <!-- modal delete -->
      
        <!-- /modal delete -->

<script type="text/javascript">



</script>

@endsection

@push('scripts')
  <script src=" {{ asset('js/quotes.js') }} "></script>
  <script src=" {{ asset('js/customer/show.js') }} "></script>
  <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
  <script src=" {{ asset('js/ckdocument.js') }} "></script>
 
@endpush
