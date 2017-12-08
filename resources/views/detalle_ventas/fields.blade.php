<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Seleccionar Cliente:') !!}
    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control']) !!}
</div>

<!-- Producto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producto_id', 'Seleccione el Producto:') !!}
    {!! Form::select('producto_id', $productos, null, ['class' => 'form-control']) !!}
</div>

<!-- Venta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('venta_id', 'Numero de venta:') !!}
    {!! Form::text('venta_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::text('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::text('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Realizar venta', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('detalleVentas.index') !!}" class="btn btn-default">Cancelar venta</a>
</div>
