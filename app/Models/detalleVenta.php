<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class detalleVenta
 * @package App\Models
 * @version December 6, 2017, 5:34 pm UTC
 */
class detalleVenta extends Model
{
    use SoftDeletes;

    public $table = 'detalle_ventas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'cliente_id',
        'producto_id',
        'venta_id',
        'cantidad',
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cliente_id' => 'integer',
        'producto_id' => 'integer',
        'venta_id' => 'integer',
        'cantidad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

   
    
    
}
