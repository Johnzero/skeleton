<?php namespace Zero\Crm\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;
use Flash;

class CustomerLists extends Controller
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    
    public $formConfig = 'config_form.yaml';
    
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Zero.Crm', 'work', 'customerlist');
    }
    
    public function listExtendQuery($query)
    {
        $query->whereNull('admin_id')->orderBy('updated_at', 'desc');
    }
    
    public function onConfirm()
    {
        $checkedIds = post('checked');
        if (!$checkedIds || !is_array($checkedIds) || !count($checkedIds)) {
            Flash::error("请选择客户！");
            
            return $this->listRefresh();
        }
        
        $find = \Zero\Crm\Models\Customer::whereIn('id', $checkedIds)->whereNotNull("admin_id")->get()->toArray();
        if (!empty($find)) {
            Flash::error("选择的客户已被认领！");
            
            return $this->listRefresh();
        }
        $user = BackendAuth::getUser();
        \Zero\Crm\Models\Customer::whereIn('id', $checkedIds)->update(array("admin_id" => $user->id));
        Flash::success('操作完成！');
        
        return $this->listRefresh();
    }
    
}
