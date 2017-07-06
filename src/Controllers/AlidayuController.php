<?php
/**
 * Class AlidayuController
 * @package Notadd\Alidayu
 */
namespace Notadd\Alidayu\Controllers;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Alidayu\Alidayu;
use Notadd\Alidayu\Handlers\GetHandler;
use Notadd\Alidayu\Handlers\SendHandler;
use Notadd\Alidayu\Handlers\SetHandler;
use Notadd\Alidayu\Handlers\CheckHandler;
use Notadd\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;

class AlidayuController extends Controller
{

    /**
     * get Alidayu
     *
     * @param \Notadd\Alidayu\Alidayu $Alidayu
     * @param string $config
     * @return \Intervention\Image\ImageManager->response
     */
    public function getAlidayu(Alidayu $Alidayu, $config = 'default')
    {
        // dd($config);
        return $Alidayu->create($config);
    }

    public function test()
    {
        // 使用方法一
        $alidayu = app('alidayu');
        $req     = new AlibabaAliqinFcSmsNumSend(app('Illuminate\Session\Store'), app('Illuminate\Hashing\BcryptHasher'));

        $num = rand(100000, 999999);
        $req->setRecNum('13319236171')
            ->setSmsParam([
                'code' => $num,
                'product' => '52好工具'
            ])
            ->setSmsFreeSignName('注册验证')
            ->setSmsTemplateCode('SMS_66925302');

        $resp = $alidayu->execute($req);

        print_r($resp);
        // print_r($resp->result->model);
    }

    public function send(SendHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }



    /**
     * Get handler.
     *
     * @param \Notadd\Alidayu\Handlers\GetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function get(GetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Set handler.
     *
     * @param \Notadd\Alidayu\Handlers\SetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function set(SetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    public function check(CheckHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

}
