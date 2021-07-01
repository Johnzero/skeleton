<?php namespace Zero\Crm\Models;

use Model;

/**
 * Model
 */
class Room extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'zero_crm_room';
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    
    public $belongsTo = [
        'building' => ['Zero\Crm\Models\Building'],
    ];
    
    public $attachOne = [
        'picture' => \System\Models\File::class
    ];
    
    public function getAddressAttribute($value)
    {
        if ($this->building_id) {
            $building = Building::where("id", $this->building_id)->first();
            
            return $building['name'] . ' ' . $this->unit;
        } else {
            return $this->unit;
        }
    }
}
