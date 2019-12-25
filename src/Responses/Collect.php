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
 * @property string $status
 */
class Collect
{
    const STATUS_COMPLETE = 'COMPLETE';
    const STATUS_PENDING = 'PENDING';
    const STATUS_CANCELLED = 'CANCELLED';
    const STATUS_FAILED = 'FAILED';
}
