<?php
/**
 * The file is part of Notadd
 *
 * @author: AllenGu<674397601@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime: 17-7-6 下午3:03
 */

namespace Notadd\Alidayu\Handlers;

use Notadd\Foundation\Passport\Abstracts\SetHandler as AbstractSetHandler;

/**
 * Class DataHandler.
 */
class CheckHandler extends AbstractSetHandler
{
    public function execute()
    {
        $this->validate($this->request, [
            'captcha' => 'required|regex:/^[0-9]{6}/'
        ], [
            'captcha.required' => '验证码不能为空',
            'captcha.numeric' => '验证码必须为6位数字'
        ]);

        $captcha = $this->request->input('captcha');

    }
}