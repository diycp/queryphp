<?php
// ©2017 http://your.domain.com All rights reserved.
namespace admin\is\repository;

use queryyetsimple\mvc\repository;
use admin\domain\entity\admin_menu as aggregate;
use queryyetsimple\mvc\interfaces\iaggregate_root;
use admin\domain\repository\admin_menu as admin_menu_repository;

/**
 * 后台菜单实体（聚合根）实现
 *
 * @author Name Your <your@mail.com>
 * @package $$
 * @since 2017.10.12
 * @version 1.0
 */
class admin_menu extends repository implements admin_menu_repository {
    
    /**
     * 构造函数
     *
     * @param \admin\domain\entity\admin_menu $oAggregate            
     * @return void
     */
    public function __construct(aggregate $objAggregate) {
        parent::__construct ( $objAggregate );
    }
    
    /**
     * 取得所有记录
     *
     * @param null|callback $mixCallback            
     * @return \queryyetsimple\support\collection
     */
    public function all($mixSpecification = null) {
        return parent::all ( $this->specification ( function ($objSelect) {
            $objSelect->orderBy ( 'sort DESC' );
        }, $mixSpecification ) );
    }
    
    /**
     * 是否存在子菜单
     *
     * @param int $nId            
     * @return boolean
     */
    public function hasChildren($nId) {
        return $this->count ( function ($objSelect) use($nId) {
            $objSelect->where ( 'pid', $nId );
        } ) ? true : false;
    }
    
    /**
     * 后台菜单
     *
     * @return array
     */
    public function topNode() {
        return [ 
                'id' => - 1,
                'pid' => 0,
                'lable' => '选择父级菜单' 
        ];
    }
}
