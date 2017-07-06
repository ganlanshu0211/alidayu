<?php
/**
 * The file is part of Notadd
 *
 * @author: AllenGu<674397601@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime: 17-7-6 下午4:36
 */

namespace Notadd\Alidayu\Handlers;

use Notadd\Foundation\Passport\Abstracts\SetHandler as AbstractSetHandler;
use Notadd\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;

class TestHandler extends AbstractSetHandler
{
    public function execute()
    {
        // 使用方法一
        $mobile = $this->request->query('mobile');
        $alidayu = app('alidayu');
        $req = new AlibabaAliqinFcSmsNumSend(app('Illuminate\Session\Store'), app('Illuminate\Hashing\BcryptHasher'));

        $num = rand(100000, 999999);
        $req->setRecNum($mobile)
            ->setSmsParam([
                'code' => $num,
                'product' => '52好工具'
            ])
            ->setSmsFreeSignName('注册验证')
            ->setSmsTemplateCode('SMS_66925302');

        $resp = $alidayu->execute($req);

        print_r($resp);
    }
}