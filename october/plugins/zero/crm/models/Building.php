<?php namespace Zero\Crm\Models;

use Model;

/**
 * Model
 */
class Building extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'zero_crm_building';
    
    public $implement = ['RainLab.Location.Behaviors.LocationModel'];
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    
    public $belongsTo = [
        'province' => ['RainLab\Location\Models\Country'],
        'city'     => ['RainLab\Location\Models\State']
    ];
}
