<?php
/**
 * Class AlidayuController
 * @package Notadd\Alidayu
 */
namespace Notadd\Alidayu\Controllers;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Alidayu\Alidayu;
use Notadd\Alidayu\Handlers\GetHandler;
use Notadd\Alidayu\Handlers\SetHandler;
use Notadd\Alidayu\Handlers\ValidationHandler;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Notadd\Alidayu\Client;
use Notadd\Alidayu\App;
use Notadd\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;
use Notadd\Alidayu\Requests\IRequest;

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

        // 配置信息
        $config = [
            'app_key'    => '23818873',
            'app_secret' => '009e9695517de37cd60dd32cd1e400a9',
            // 'sandbox'    => true,  // 是否为沙箱环境，默认false
        ];


        // 使用方法一
        $client = new Client(new App($config));
        $req    = new AlibabaAliqinFcSmsNumSend;

        $req->setRecNum('18825078190')
            ->setSmsParam([
                'code' => rand(100000, 999999),
                'product' => '52好工具'
            ])
            ->setSmsFreeSignName('注册验证')
            ->setSmsTemplateCode('SMS_66925302');

        $resp = $client->execute($req);

        print_r($resp);
        // print_r($resp->result->model);

    }

    /**
     * Alidayu validation
     *
     * @param string $Alidayu
     * @return boolean
     */
    public function Alidayu(ValidationHandler $handler)
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

}
