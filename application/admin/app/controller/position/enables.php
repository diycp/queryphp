<?php
// (c) 2018 http://your.domain.com All rights reserved.
namespace admin\app\controller\position;

use queryyetsimple\request;
use admin\app\controller\aaction;
use admin\domain\service\admin_position\enables_failed;
use admin\domain\service\admin_position\enables as service;

/**
 * 后台职位批量禁用启用
 *
 * @author Name Your <your@mail.com>
 * @package $$
 * @since 2017.10.23
 * @version 1.0
 */
class enables extends aaction
{

    /**
     * 响应方法
     *
     * @param \admin\domain\service\admin_position\enables $oService
     * @return mixed
     */
    public function run(service $oService)
    {
        try {
            $mixResult = $oService->run($this->ids(), $this->status());
            return [
                'message' => sprintf('职位%s成功', $this->status() == 'enable' ? '启用' : '禁用')
            ];
        } catch (enables_failed $oE) {
            return [
                'code' => 400,
                'message' => $oE->getMessage()
            ];
        }
    }

    /**
     * 启用禁用状态
     *
     * @return string
     */
    protected function status()
    {
        return trim(request::all('status'));
    }

    /**
     * 批量启用禁用 ID
     *
     * @return array
     */
    protected function ids()
    {
        return request::all('ids');
    }
}
