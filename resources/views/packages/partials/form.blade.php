<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{ Form::text('name',null, ['required'=>"required", 'class'=>"form-control col-md-7 col-xs-12"] ) }}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripción<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{ Form::text('description',null, ['required'=>"required", 'class'=>"form-control col-md-7 col-xs-12"] ) }}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{ Form::text('price',null, ['required'=>"required", 'class'=>"form-control col-md-7 col-xs-12"] ) }}
    </div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button class="btn btn-primary" type="reset">Resetear</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</div>