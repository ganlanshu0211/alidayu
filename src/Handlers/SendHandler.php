<?php
/**
 * The file is part of Notadd
 *
 * @author: AllenGu<674397601@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime: 17-7-6 下午3:05
 */

namespace Notadd\Alidayu\Handlers;

use Notadd\Foundation\Passport\Abstracts\SetHandler as AbstractSetHandler;
use Notadd\Alidayu\Requests\AlibabaAliqinFcSmsNumSend;

/**
 * Class SendHandler.
 */
class SendHandler extends AbstractSetHandler
{
    public function execute()
    {
        $this->validate($this->request, [
            'mobile' => 'required'
        ], [
            'mobile.required' => '电话号码为必传参数'
        ]);

        $mobile = $this->request->input('mobile');

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

        $session = app('session.store');

        $session->put('mobileCaptcha', [
            'mobile' => $mobile,
            'captcha' => $num
        ]);
        $mobileCaptcha = $this->request->input('mobileCaptcha');



        $this->withCode(200)->withData($resp)->withMessage('success');


    }
}