<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class venta
 * @package App\Models
 * @version December 6, 2017, 5:28 pm UTC
 */
class venta extends Model
{
    use SoftDeletes;

    public $table = 'ventas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    

    
}
