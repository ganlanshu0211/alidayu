<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-02-23 19:42
 */
namespace Notadd\Alidayu\Listeners;

use Notadd\Alidayu\Controllers\AlidayuController;
use Notadd\Foundation\Routing\Abstracts\RouteRegister as AbstractRouteRegister;

/**
 * Class RouteRegister.
 */
class RouteRegister extends AbstractRouteRegister
{
    /**
     * Handle Route Registrar.
     */
    public function handle()
    {
        // api路由定义
        $this->router->group(['middleware' => ['cross', 'web'], 'prefix' => 'api/alidayu'], function () {
            $this->router->post('get', AlidayuController::class . '@get');
            $this->router->post('set', AlidayuController::class . '@set');
            $this->router->post('send', AlidayuController::class . '@send');
            $this->router->post('check', AlidayuController::class . '@check');
        });
        // 测试路由,只需用get方法加上参数mobile＝12345678912即可发送短信到12345678912手机上
        $this->router->get('test', AlidayuController::class . '@test');
        $this->router->get('hash', AlidayuController::class . '@test2');
    }
}
