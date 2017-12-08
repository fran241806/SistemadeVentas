<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
    <a href="{!! route('clientes.index') !!}"><i class="fa fa-edit"></i><span>clientes</span></a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-edit"></i><span>categorias</span></a>
</li>

<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('productos.index') !!}"><i class="fa fa-edit"></i><span>productos</span></a>
</li>

<li class="{{ Request::is('ventas*') ? 'active' : '' }}">
    <a href="{!! route('ventas.index') !!}"><i class="fa fa-edit"></i><span>ventas</span></a>
</li>

<li class="{{ Request::is('detalleVentas*') ? 'active' : '' }}">
    <a href="{!! route('detalleVentas.index') !!}"><i class="fa fa-edit"></i><span>detalleVentas</span></a>
</li>

