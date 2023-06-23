<?php

namespace Racent\Responses;

/**
 * @property string $certId
 * @property integer $vendorId
 * @property integer $vendorCertId
 * @property string $DCVfileName 文件验证文件名
 * @property string $DCVfileContent 文件验证文件内容
 * @property string $DCVdnsHost Dns验证主机值
 * @property string $DCVdnsValue Dns验证记录值
 * @property string $DCVdnsType Dns验证记录类型
 * @property string $DCVfilePath 文件验证文件路径
 * @property SslPlace\DcvInfo $dcvInfo 申请证书中的每个域名验证值不一样时，此项为Y
 */
class SslPlace
{
}
