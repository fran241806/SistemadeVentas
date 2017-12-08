<table class="table table-responsive" id="detalleVentas-table">
    <thead>
        <th>Cliente Id</th>
        <th>Producto Id</th>
        <th>Venta Id</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($detalleVentas as $detalleVenta)
        <tr>
            <td>{!! $detalleVenta->cliente_id !!}</td>
            <td>{!! $detalleVenta->producto_id !!}</td>
            <td>{!! $detalleVenta->venta_id !!}</td>
            <td>{!! $detalleVenta->cantidad !!}</td>
            <td>{!! $detalleVenta->subtotal !!}</td>
            <td>
                {!! Form::open(['route' => ['detalleVentas.destroy', $detalleVenta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('detalleVentas.show', [$detalleVenta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('detalleVentas.edit', [$detalleVenta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>