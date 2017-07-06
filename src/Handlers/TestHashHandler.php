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


class TestHashHandler extends AbstractSetHandler
{
    public function execute()
    {
        $hash = app('Illuminate\Hashing\BcryptHasher');
        $result = $hash->check('461302', '$2y$10$ceexXFXwkt2hmf0gj.9p.extE6gBoBDbJBw6BD5PApUHg2HdxiwQ6');
    }
}