<table class="table table-responsive" id="ventas-table">
    <thead>
        <th>Fecha</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($ventas as $venta)
        <tr>
            <td>{!! $venta->fecha !!}</td>
            <td>
                {!! Form::open(['route' => ['ventas.destroy', $venta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ventas.show', [$venta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ventas.edit', [$venta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>