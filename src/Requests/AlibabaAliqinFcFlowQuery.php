<?php
/**
 * 阿里大于 - 流量直充查询
 *
 * @author Notadd <2016-09-20 21:01:23>
 * @link   http://Notadd.com
 * @link   http://open.taobao.com/docs/api.htm?apiId=26305
 */
namespace Notadd\Alidayu\Requests;

class AlibabaAliqinFcFlowQuery extends Request implements IRequest
{
    /**
     * 接口名称
     * @var string
     */
    protected $method = 'alibaba.aliqin.fc.flow.query';

    /**
     * 初始化
     */
    public function __construct()
    {
        $this->params = [
            'out_id' => '',  // 必须 唯一流水号
        ];
    }

    /**
     * 设置唯一流水号
     * @param string $value 唯一流水号
     */
    public function setOutId($value)
    {
        $this->params['out_id'] = $value;

        return $this;
    }
}
