<?php namespace Zero\Crm\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;

class MyCustomers extends Controller
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    
    public $formConfig = 'config_form.yaml';
    
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Zero.Crm', 'work', 'mycustomer');
    }
    
    public function listExtendQuery($query)
    {
        $user = BackendAuth::getUser();
        $query->where('admin_id', $user->id)->whereNull('sign_time')->orderBy('updated_at', 'desc');
    }
    
}
