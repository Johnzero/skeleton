<?php

declare (strict_types = 1);

namespace App\Model\Crm;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int            $id
 * @property string         $name
 * @property string         $description
 * @property string         $total_area
 * @property string         $area
 * @property int            $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Building extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'building';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'status'     => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    protected $connection = 'default';
    
    // public function getUserName() {
    //     return $this->belongsTo('App\Model\Auth\User', 'user_id', 'id');
    // }
    
}
