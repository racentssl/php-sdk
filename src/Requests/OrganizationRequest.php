<?php

namespace Racent\Requests;

class OrganizationRequest
{
    /**
     * 公司所在城市。当订购产品不是dv类型时，此参数为Y。
     *
     * @var string
     */
    public $organizationCity;

    /**
     * 公司名称。当订购产品不是dv类型时，此参数为Y。
     *
     * @var string
     */
    public $organizationName;

    /**
     * 公司电话。当订购产品不是dv类型时，此参数为Y。
     *
     * @var string
     */
    public $organizationMobile;

    /**
     * 公司地址。当订购产品不是dv类型时，此参数为Y。
     *
     * @var string
     */
    public $organizationAddress;

    /**
     * 公司所在国家。当订购产品不是dv类型时，此参数为Y。具体编码见附录3.3
     *
     * @var string
     */
    public $organizationCountry;

    /**
     * 公司所在地邮编。当订购产品不是dv类型时，此参数为Y。
     *
     * @var string
     */
    public $organizationPostCode;

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
