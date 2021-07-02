<?php namespace Zero\Crm\Models;

use Model;
use BackendAuth;

/**
 * Model
 */
class Customer extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'zero_crm_customer';
    
    /**
     * @var array Validation rules
     */
    public $rules = [
        'username' => 'required',
        'room_id'  => 'required|unique:zero_crm_customer'
    ];
    
    public $customMessages = [
        'unique' => '该房间已被占用'
    ];
    
    public $belongsTo = [
        'room'  => ['Zero\Crm\Models\Room'],
        'admin' => ['Backend\Models\User']
    ];
    
    // public function beforeSave()
    // {
    //     // return false;
    //     // $user = BackendAuth::getUser();
    //     // $find = Room::where("id", $this->room_id)->first();
    //     // if (!empty($find)) {
    //     //     return false;
    //     // }
    //     // $this->admin_id = $user->id;
    // }
    
    public function beforeUpdate()
    {
        $this->updated_at = date("Y-m-d H:i:s");
        // var_dump($this->updated_at);
        // exit;
        // $user = BackendAuth::getUser();
        // $this->admin_id = $user->id;
    }
    
}
