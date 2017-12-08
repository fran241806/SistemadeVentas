<?php

namespace App\Repositories;

use App\Models\detalleVenta;
use InfyOm\Generator\Common\BaseRepository;

class detalleVentaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cliente_id',
        'producto_id',
        'venta_id',
        'cantidad',
        'subtotal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return detalleVenta::class;
    }
}
