<?php
// (c) 2018 http://your.domain.com All rights reserved.
namespace admin\app\controller\structure;

use queryyetsimple\request;
use admin\app\controller\aaction;
use admin\app\service\structure\store as service;

/**
 * 后台部门新增保存
 *
 * @author Name Your <your@mail.com>
 * @package $$
 * @since 2017.10.23
 * @version 1.0
 */
class store extends aaction
{

    /**
     * 响应方法
     *
     * @param \admin\app\service\structure\store $oService
     * @return mixed
     */
    public function run(service $oService)
    {
        $mixResult = $oService->run($this->data());
        return [
            'message' => '部门保存成功'
        ];
    }

    /**
     * POST 数据
     *
     * @return array
     */
    protected function data()
    {
        return request::alls([
                'name|trim',
                'pid'
        ]);
    }
}
