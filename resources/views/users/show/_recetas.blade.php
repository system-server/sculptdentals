                       
  <div role="tabpanel" class="tab-pane fade" id="recetas" aria-labelledby="profile-tab">
    <div style="text-align: right;">
      @can('treatments.create')
        <button class="btn btn-default btn-xs btn-quote-add">
          <i class="fa fa-plus-circle m-right-xs"></i>
        </button>
      @endcan
    </div>
  <!--Mostrar el form solo al doctor-->
  @if(isset($doctor))
    <form id="form-editor" action=" {{ route('recipes.store') }} " method="post" style="display: none">
      <div class="form-group">  
        <input type="hidden" name="idDoctor" value="{{ Auth::user()->doctor_id }}">
        <input type="hidden" id="idCustomer" name="idCustomer" value="{{ $customer->id }}">
        <select class="form-control" id="idArea" name="idArea" required="on">
          <option value="">Seleccione &Aacute;rea</option>
          <option value="1">Endodoncia</option>
          <option value="2">Pediatria</option>
          <option value="3">Rehabilitaci&oacute;n</option>
          <option value="4">Ortodoncia</option>
        </select>
      </div>
      <div style="text-align: right;">
        <button class="btn btn-warning btn-quote-cancel btn-xs">
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
          <textarea id="editor1" name="editor">

              <p style="text-align:center; margin-top: 500px">
                <img height="110" src="{{asset('img/template/logo.png')}}" />
              </p>


<p style="text-align: right;"><strong><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif"><span style="font-size:14px">{{$doctor->full_name}}</span><br />
{{$doctor->speciality}}</span></strong><br />
<span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif"><strong>{{$doctor->university}}<br />
C&eacute;dula&nbsp;profesional: {{$doctor->professional_card}}</strong></span></p>

<p style="text-align:right"><strong><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Fecha: <?=date('Y-m-d')?></span></strong></p>

<p style="text-align:center"><strong><span style="font-size:14px"><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">{{$customer->full_name}}</span></span></strong></p>              
                        
<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<table align="right" border="0" cellpadding="0" cellspacing="0" style="height:100px; width:300px">
  <tbody>
    <tr>
      <td style="text-align:center">_____________________________<br />
      <span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif"><strong>Firma</strong></span></td>
    </tr>
  </tbody>
</table>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:right">&nbsp;</p>

<p style="text-align:right">&nbsp;</p>

<p style="text-align:right"><em><span style="font-family:Lucida Sans Unicode,Lucida Grande,sans-serif">Sculp Dental<br />
Avenida Estaci&oacute;n Central #31D, San Francisco Ocotlan, Coronango, Puebla. CP: 72680</span></em></p>


          </textarea>
      </div>
    </form>
  @endif                            
  <!-- start tabla recetas -->
  @if(count($recipes)>0)
  <table class="data table table-striped table-hover no-margin" style="margin-top: 0px" id="quote-table">
    <thead>
      <tr>
        <th>Folio</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Doctor</th>
        <th style="text-align: center;width: 44px"></th>
        <th style="text-align: center;width: 44px"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($recipes as $recipe)
      <tr id="row-{{$recipe->id}}">
        <td>{{$recipe->id}}</td>
        <td>{{$recipe->name}}</td>
        <td>{{$recipe->updated_at}}</td>
        <td>{{$recipe->doctor->full_name}}</td>
        <td style="text-align: center;">
          <a href="{{route('recipes.edit', $recipe->id)}}" class="btn btn-default btn-xs">
            <i class="fa fa-pencil m-right-xs"></i>
          </a>
        </td>        
        <td style="text-align: center;">
          <a href="#"  data-recipe-id="{{$recipe->id}}" class="btn btn-default btn-xs btn-delete-recipe">
            <i class="fa fa-trash m-right-xs"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table><!-- fin tabla recetas -->
  @else
  <div class="alert alert-success alert-dismissible fade in" role="alert" id="treatment-alert" style="">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <p id="treatment-response">El cliente aun no tiene recetas</p>
    </div>
  @endif
  </div>

  <!-- modal delete -->
  <div class="modal fade bs-example-modal-sm" id="modal-recipe-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2">Confirmar</h4>
        </div>
        <div class="modal-body" style="text-align: center">
          <p>¿Esta seguro que desea eliminar la receta?</p>
        </div>
        <input type="" id="recipe-id-delete" hidden>
        <input id="url-delete-recipe" value="{{route('recipes.destroy', ':id')}}" hidden>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger btn-recipe-delete-confirm">Eliminar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /modal delete --> 