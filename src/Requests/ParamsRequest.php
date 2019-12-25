<?php

namespace Racent\Requests;

class ParamsRequest
{
    /**
     * 用openssl生成 Base-64的CSR，或者访问https://www.racent.com/generate-csr 生成Base-64的CSR（注:请妥善保存私钥）。格式如下：  -----BEGIN xxxxx-----   and   -----END xxxxx-----
     *
     * @var string
     */
    public $csr;

    /**
     * 请您使用如下服务器类型之一：  apachessl   citrix  domino  ensim  hsphere  iis4  iis6  iis7  iplanet  javawebserv  netscape  ibmhttp  novel  oracle  plesk  tomcat  webstar  whmcpane  other  apache2  c2net  cisco  cobaltseries  nginx  apacheraven  redhatsap  website  zeusv3
     *
     * @var string
     */
    public $server;

    /**
     * 域名信息，单域名证书此项重只包括一条信息。示例：           [  {    "dcvEmail": "admin@xxx.com",    "dcvMethod": "EMAIL",    "domainName": "www.xxx.com"  },   {    "dcvEmail": "admin@aaa.com",    "dcvMethod": "EMAIL",    "domainName": "aaa.com"  },   {    "dcvEmail": "admin@racent.com",    "dcvMethod": "EMAIL",    "domainName": "racent.com"  }  ]  其中具体参数描述如下：
     *
     * @var DcvRequest[] 数组
     */
    public $domainInfo;

    /**
     * 公司信息。当订购产品不是dv类型时，此参数为Y。示例如下：   {  "organizationCity": "上海",  "organizationName": "上海锐成",  "organizationMobile": "18111111111",  "organizationAddress": "上海市静安区x路",  "organizationCountry": "CN",  "organizationPostCode": "401320"  }
     *
     * @var OrganizationRequest 数组
     */
    public $organizationInfo;

    /**
     * 管理员信息。当订购产品不是dv类型时，此参数为Y。
     *
     * @var ContactsRequest
     */
    public $Administrator;

    /**
     * 财务人员信息。可以与管理员信息一致。当订购产品不是dv类型时，此参数为Y。
     *
     * @var ContactsRequest
     */
    public $finance;

    /**
     * 技术员信息。当订购产品不是dv类型时，此参数为Y。
     *
     * @var ContactsRequest
     */
    public $tech;

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
