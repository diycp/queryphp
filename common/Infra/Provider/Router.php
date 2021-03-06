<?php

declare(strict_types=1);

/*
 * This file is part of the forcodepoem package.
 *
 * The PHP Application Created By Code Poem. <Query Yet Simple>
 * (c) 2018-2099 http://forcodepoem.com All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Common\Infra\Provider;

use Leevel\Di\IContainer;
use Leevel\Router\RouterProvider;

/**
 * 路由服务提供者.
 *
 * @author Name Your <your@mail.com>
 *
 * @since 2018.04.17
 *
 * @version 1.0
 */
class Router extends RouterProvider
{
    /**
     * 控制器相对目录.
     *
     * @var string
     */
    protected $controllerDir = 'App\\Controller';

    /**
     * 中间件分组
     * 分组可以很方便地批量调用组件.
     *
     * @var array
     */
    protected $middlewareGroups = [
        // web 请求中间件
        'web' => [
            'session',
        ],

        // api 请求中间件
        'api' => [
            'throttler:60,1',
        ],

        // 公共请求中间件
        'common' => [
            'log',
        ],
    ];

    /**
     * 中间件别名
     * HTTP 中间件提供一个方便的机制来过滤进入应用程序的 HTTP 请求
     * 例外在应用执行结束后响应环节也会调用 HTTP 中间件.
     *
     * @var array
     */
    protected $middlewareAlias = [
        'auth'        => 'Leevel\\Auth\\Middleware\\Auth',
        'debug'       => 'Leevel\\Debug\\Middleware\\Debug',
        'log'         => 'Leevel\\Log\\Middleware\\Log',
        'session'     => 'Leevel\\Session\\Middleware\\Session',
        'throttler'   => 'Leevel\\Throttler\\Middleware\\Throttler',
    ];

    /**
     * 创建一个服务容器提供者实例.
     *
     * @param \Leevel\Di\IContainer $container
     */
    public function __construct(IContainer $container)
    {
        parent::__construct($container);

        if ($container->debug()) {
            $this->middlewareGroups['common'][] = 'debug';
        }
    }

    /**
     * bootstrap.
     */
    public function bootstrap()
    {
        parent::bootstrap();
    }

    /**
     * 返回路由.
     *
     * @return array
     */
    public function getRouters(): array
    {
        return parent::getRouters();
    }
}
