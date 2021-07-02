<?php namespace Zero\Crm\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;
use Request;

class Inprogress extends Controller
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    
    public $formConfig = 'config_form.yaml';
    
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Zero.Crm', 'progress', 'inprogress');
    }
    
    public function listExtendQuery($query)
    {
        $user = BackendAuth::getUser();
        if (Request::is('*/ysp')) {
            $query->where('yhjd', '已审批');
        }
        if (Request::is('*/one')) {
            $query->where('can_pz', '一拍结束');
        }
        if (Request::is('*/two')) {
            $query->where('can_pz', '二拍结束');
        }
        if (Request::is('*/done')) {
            $query->where('yhjd', '已放全款');
        }
        $query->where('admin_id', $user->id)->whereNotNull('sign_time')->orderBy('updated_at', 'desc');
    }
    
    public function ysp()
    {
        BackendMenu::setContext('Zero.Crm', 'progress', 'ysp');
        $this->asExtension('ListController')->index();
        
        return $this->makePartial('~/plugins/zero/crm/controllers/inprogress/index.htm');
    }
    
    public function one()
    {
        BackendMenu::setContext('Zero.Crm', 'progress', 'one');
        $this->asExtension('ListController')->index();
        
        return $this->makePartial('~/plugins/zero/crm/controllers/inprogress/index.htm');
    }
    
    public function two()
    {
        BackendMenu::setContext('Zero.Crm', 'progress', 'two');
        $this->asExtension('ListController')->index();
        
        return $this->makePartial('~/plugins/zero/crm/controllers/inprogress/index.htm');
    }
    
    public function done()
    {
        BackendMenu::setContext('Zero.Crm', 'progress', 'done');
        $this->asExtension('ListController')->index();
        
        return $this->makePartial('~/plugins/zero/crm/controllers/inprogress/index.htm');
    }
    
}
