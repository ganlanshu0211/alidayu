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
use Notadd\Alidayu\Models\AlidayuLogs;

/**
 * Class SendHandler.
 */
class SendHandler extends AbstractSetHandler
{
    public function execute()
    {
        $this->validate($this->request, [
            'mobile' => 'required|regex:/^[0-9]{11}/'
        ], [
            'mobile.required' => '电话号码为必传参数',
            'mobile.regex' => '电话号码必须为11位0-9的数字'
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

        //哈希验证码并存入session中

        $hash = app('Illuminate\Hashing\BcryptHasher');

        $hashedCaptcha = $hash->make($num);

        $session->flash('mobileCaptcha', json_encode([
            'mobile' => $mobile,
            'captcha' => $hashedCaptcha
        ]));

        $log = new AlidayuLogs();

        $log->mobile = $mobile;
        $log->captcha = $num;
        $log->content = "test";
        $log->register_ip = $this->request->getClientIp();

        $log->save();

        $this->withCode(200)->withData($resp)->withMessage('success');


    }
}