<?php

namespace Racent\Requests;

/**
 * 联系人，管理员、财务联系人、技术联系人的数据结构
 */
class ContactsRequest
{
    /**
     * @var string 财务员职位。当订购产品不是dv类型时，此参数为Y。
     */
    public $job;

    /**
     * @var string 财务员所在城市。当订购产品不是dv类型时，此参数为Y。
     */
    public $city;

    /**
     * @var string 财务员的邮箱。当订购产品不是dv类型时，此参数为Y。
     */
    public $email;

    /**
     * @var string 财务员所在省或州。当订购产品不是dv类型时，此参数为Y。
     */
    public $state;

    /**
     * @var string 财务员联系方式。当订购产品不是dv类型时，此参数为Y。
     */
    public $mobile;

    /**
     * @var string 财务员联系地址。当订购产品不是dv类型时，此参数为Y。
     */
    public $address;

    /**
     * @var string 财务员所在国家。当订购产品不是dv类型时，此参数为Y。具体编码见附录3.3
     */
    public $country;

    /**
     * @var string 财务员姓。当订购产品不是dv类型时，此参数为Y。
     */
    public $lastName;

    /**
     * @var string 财务员所在地邮编。当订购产品不是dv类型时，此参数为Y。
     */
    public $postCode;

    /**
     * @var string 财务员名字。当订购产品不是dv类型时，此参数为Y。
     */
    public $firstName;

    /**
     * @var string 财务员所在公司。当订购产品不是dv类型时，此参数为Y。
     */
    public $organation;

    public $idType;

    public function __construct($job = null, $country = null, $state = null, $city = null, $email = null, $address = null, $organation = null, $mobile = null, $firstName = null, $lastName = null, $postCode = null, $idType = 'TYDMZ')
    {
        $this->job = $job;
        $this->country = $country;
        $this->state = $state;
        $this->city = $city;
        $this->address = $address;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->lastName = $lastName;
        $this->postCode = $postCode;
        $this->firstName = $firstName;
        $this->organation = $organation;
        $this->idType = $idType;
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
