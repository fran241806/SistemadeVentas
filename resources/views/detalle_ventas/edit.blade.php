@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detalle Venta
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detalleVenta, ['route' => ['detalleVentas.update', $detalleVenta->id], 'method' => 'patch']) !!}

                        @include('detalle_ventas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection