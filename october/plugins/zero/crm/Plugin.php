<?php namespace Zero\Crm;

use System\Classes\PluginBase;
use Backend;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }
    
    public function registerSettings()
    {
    }
    
    public function registerPermissions()
    {
        return [
            'crm_data' => [
                'tab'   => '数据管理',
                'label' => '数据管理',
            ],
            'building' => [
                'tab'   => '数据管理',
                'label' => '楼盘管理',
            ],
        ];
    }
    
    public function registerNavigation()
    {
        return [
            'data'     => [
                'label'       => '数据管理',
                'url'         => Backend::url('zero/crm/buildings'),
                'icon'        => 'icon-database',
                'permissions' => ['crm_data'],
                'order'       => 310,
                'sideMenu'    => [
                    'building' => array(
                        'label'       => '楼盘管理',
                        'icon'        => 'icon-home',
                        'url'         => Backend::url('zero/crm/buildings'),
                        'permissions' => ['building']
                    ),
                    'room'     => array(
                        'label'       => '房屋管理',
                        'icon'        => 'icon-inbox',
                        'url'         => Backend::url('zero/crm/rooms'),
                        'permissions' => ['building']
                    ),
                    'customer' => array(
                        'label'       => '客户管理',
                        'icon'        => 'icon-id-card',
                        'url'         => Backend::url('zero/crm/customers'),
                        'permissions' => ['building']
                    ),
                ]
            ],
            'work'     => [
                'label'    => '楼盘销控',
                'url'      => Backend::url('zero/crm/customerlists'),
                'icon'     => 'icon-id-card-o',
                'order'    => 300,
                'sideMenu' => [
                    'customerlist' => array(
                        'label' => '客户认领',
                        'icon'  => 'icon-home',
                        'url'   => Backend::url('zero/crm/customerlists')
                    ),
                    'mycustomer'   => array(
                        'label' => '对接客户',
                        'icon'  => 'icon-inbox',
                        'url'   => Backend::url('zero/crm/mycustomers'),
                    )
                ]
            ],
            'progress' => [
                'label'    => '签约数据流转',
                'url'      => Backend::url('zero/crm/inprogress'),
                'icon'     => 'icon-check-square-o',
                'order'    => 300,
                'sideMenu' => [
                    'inprogress' => array(
                        'label' => '数据流转',
                        'icon'  => 'icon-random',
                        'url'   => Backend::url('zero/crm/inprogress')
                    ),
                    'ysp'        => array(
                        'label' => '已审批',
                        'icon'  => 'icon-calendar-check-o',
                        'url'   => Backend::url('zero/crm/inprogress/ysp'),
                    ),
                    'one'        => array(
                        'label' => '一拍结束',
                        'icon'  => 'icon-camera-retro',
                        'url'   => Backend::url('zero/crm/inprogress/one'),
                    ),
                    'two'        => array(
                        'label' => '二拍结束',
                        'icon'  => 'icon-camera',
                        'url'   => Backend::url('zero/crm/inprogress/two'),
                    ),
                    'done'       => array(
                        'label' => '全部放款',
                        'icon'  => 'icon-inbox',
                        'url'   => Backend::url('zero/crm/inprogress/done'),
                    )
                ]
            ]
        ];
    }
}
