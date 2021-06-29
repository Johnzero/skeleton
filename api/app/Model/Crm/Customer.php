<?php

declare (strict_types = 1);

namespace App\Model\Crm;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int            $id
 * @property string         $username
 * @property int            $sex
 * @property string         $idcard
 * @property string         $tel
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer';
    
    protected $connection = 'default';
    
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
    protected $casts = ['id' => 'integer', 'sex' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
