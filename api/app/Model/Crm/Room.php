<?php

declare (strict_types = 1);

namespace App\Model\Crm;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int            $id
 * @property int            $building_id
 * @property int            $unit
 * @property int            $number
 * @property string         $size
 * @property string         $price
 * @property string         $layout
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string         $picture
 */
class Room extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'room';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    
    protected $connection = 'default';
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'building_id' => 'integer',
        'unit'        => 'integer',
        'number'      => 'integer',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime'
    ];
}
