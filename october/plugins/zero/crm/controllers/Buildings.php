<?php namespace Zero\Crm\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Buildings extends Controller
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    
    public $formConfig = 'config_form.yaml';
    
    public $requiredPermissions = [
        'building'
    ];
    
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Zero.Crm', 'data', 'building');
    }
}
