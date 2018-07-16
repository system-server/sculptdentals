                    
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::text('name',null, ['required'=>"required", 'class'=>"form-control col-md-7 col-xs-12"] ) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Paterno<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::text('last_name_one',null, ['required'=>"required", 'class'=>"form-control col-md-7 col-xs-12"] ) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Materno<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::text('last_name_two',null, ['required'=>"required", 'class'=>"form-control col-md-7 col-xs-12"] ) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sexo
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::select('sex',['MASCULINO'=>'Masculino', 'FEMENINO'=>'Femenino'],null, ['required'=>"required", 'class'=>"form-control col-md-7 col-xs-12"] ) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Dirección
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::textarea('address',null, ['class'=>"form-control col-md-7 col-xs-12",'size' => '3x2'] ) }}
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Referencias
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::textarea('references',null, ['class'=>"form-control col-md-7 col-xs-12",'size' => '3x2'] ) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Estado civil
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::select('civil_state',['SOLTERO'=>'Soltero', 'CASADO'=>'Casado','VIUDO'=>'Viudo'],null, ['required'=>"required", 'class'=>"form-control col-md-7 col-xs-12"] ) }}
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ocupación
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::select('occupation_id',$occupations ,null, ['required'=>"required", 'class'=>"form-control col-md-7 col-xs-12"] ) }}
                        </div>
                      </div>                                         
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono celular
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::text('cell_phone',null, ['class'=>"form-control col-md-7 col-xs-12"] ) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono de casa
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::text('home_phone',null, ['class'=>"form-control col-md-7 col-xs-12"] ) }}
                        </div>
                      </div>                                          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Edad
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::number('age',null, ['class'=>"form-control col-md-7 col-xs-12"] ) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Estatus
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::select('status',['ACTIVO'=>'Activo', 'INACTIVO'=>'Inactivo'],null, ['required'=>"required", 'class'=>"form-control col-md-7 col-xs-12"] ) }}
                        </div>
                      </div>                       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="reset">Resetear</button>
                          <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                      </div>

                    