<?php

namespace Racent\Responses;

/**
 * @property integer $vendorId
 * @property integer $vendorCertId
 * @property string $certPath "https://portal.racent.com/sslFiles/20191221/aaaa.zip"
 * @property string $beginDate "2019-12-21 08:00:00"
 * @property string $endDate "2020-03-22 07:59:58"
 * @property string $certificate
 * @property string $caCertificate
 * @property string $status 'PENDING'|'COMPLETE'|'CANCELLED'
 * @property string $DCVfileName 文件验证文件名
 * @property string $DCVfileContent 文件验证文件内容
 * @property string $DCVdnsHost Dns验证主机值
 * @property string $DCVdnsValue Dns验证记录值
 * @property string $DCVdnsType Dns验证记录类型
 * @property string $DCVfilePath 文件验证文件路径
 * @property SslPlace\DcvInfo $dcvInfo 申请证书中的每个域名验证值不一样时，此项为Y
 */
class Collect
{
    const STATUS_COMPLETE = 'COMPLETE';
    const STATUS_PENDING = 'PENDING';
    const STATUS_CANCELLED = 'CANCELLED';
    const STATUS_FAILED = 'FAILED';
}
