<?php

namespace Racent\Requests;

class DcvRequest
{
    /**
     * 域名验证方式，必须为以下四种方式之一：    EMAIL(邮箱验证)    HTTP_CSR_HASH(文件验证)    CNAME_CSR_HASH(DNS验证)    HTTPS_CSR_HASH(https文件验证)
     *
     * @var string
     */
    public $dcvMethod;

    /**
     * 当订购sectigo证书并且验证方式为EMAIL时，此项为Y，获取管理员邮箱，请参照：获取DCV邮箱接口。此参数必须为获取DCV邮箱接口中的一个
     *
     * @var string
     */
    public $dcvEmail;

    /**
     * 申请的域名
     *
     * @var string
     */
    public $domainName;

    public function __construct($domainName = null, $dcvMethod = null, $dcvEmail = null)
    {
        $this->dcvMethod = $dcvMethod;
        $this->dcvEmail = $dcvEmail;
        $this->domainName = $domainName;
    }

    /**
     * 转化为数组
     *
     * @return array
     */
    public function toArray()
    {
        return (array) $this;
    }
}
