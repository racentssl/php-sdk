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

    public function __construct($organizationName = null, $organizationMobile = null, $organizationAddress = null, $organizationCountry = null, $organizationCity = null, $organizationPostCode = null)
    {
        $this->organizationName = $organizationName;
        $this->organizationMobile = $organizationMobile;
        $this->organizationAddress = $organizationAddress;
        $this->organizationCountry = $organizationCountry;
        $this->organizationCity = $organizationCity;
        $this->organizationPostCode = $organizationPostCode;
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
