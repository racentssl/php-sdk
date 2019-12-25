<?php

namespace Racent;

use Racent\Exceptions\RacentException;
use Racent\Requests\ParamsRequest;
use Racent\Traits\RacentResources;

class RacentSsl
{
    use RacentResources;

    const DCV_METHOD_EMAIL = 'EMAIL';
    const DCV_METHOD_DNS = 'CNAME_CSR_HASH';
    const DCV_METHOD_HTTP = 'HTTP_CSR_HASH';
    const DCV_METHOD_HTTPS = 'HTTPS_CSR_HASH';

    /**
     * 校验参数是否存在问题
     *
     * @param string $productCode  Y 产品编码，获取产品编码（见附录3.2）
     * @param int $years  Y 购买年限（目前只支持1，2），必须为1或2
     * @param ParamsRequest $params  Y 订购信息，具体描述如下
     *
     * @throws RacentException
     */
    public function valide($productCode, $years, ParamsRequest $params)
    {
        return $this->racent->post('/ssl/validate', [], collect([
            'productCode' => $productCode,
            'years' => $years,
            'params' => json_encode($params),
        ])->filter()->toArray());
    }

    /**
     * 下单
     *
     * @param string $productCode  Y 产品编码，获取产品编码（见附录3.2）
     * @param int $years  Y 购买年限（目前只支持1，2），必须为1或2
     * @param ParamsRequest $params  Y 订购信息，具体描述如下
     *
     * @return \Racent\Responses\SslPlace
     *
     * @throws RacentException
     */
    public function place($productCode, $years, ParamsRequest $params)
    {
        return $this->racent->post('/ssl/place', [], collect([
            'productCode' => $productCode,
            'years' => $years,
            'params' => json_encode($params),
        ])->filter()->toArray());
    }

    /**
     * 替换 SSL 订阅信息
     *
     * @param string $certId  要替换证书 id
     * @param ParamsRequest $params  Y 订购信息，具体描述如下
     *
     * @return \Racent\Responses\SslPlace
     *
     * @throws RacentException
     */
    public function replace($certId, ParamsRequest $params)
    {
        return $this->racent->post('/ssl/replace', [], collect([
            'certId' => $certId,
            'params' => json_encode($params),
        ])->filter()->toArray());
    }

    /**
     * 取消 SSL 订阅
     *
     * @param string $certId  要替换证书 id
     * @param string $reason  取消原因
     *
     * @return \Racent\Responses\SslPlace
     *
     * @throws RacentException
     */
    public function cancel($certId, $reason)
    {
        return $this->racent->post('/ssl/cancel', [], collect([
            'certId' => $certId,
            'reason' => $reason,
        ])->filter()->toArray());
    }

    /**
     * 获取证书申请状态
     *
     * @param string $certId 上面订购接口返回的certId(证书id)
     *
     * @return \Racent\Responses\Collect
     *
     * @throws RacentException
     */
    public function collect($certId)
    {
        return $this->racent->post('/ssl/collect', [], collect([
            'certId' => $certId,
        ])->toArray());
    }

    /**
     * 获取验证邮箱
     *
     * @param string $domain 域名
     *
     * @throws RacentException
     */
    public function DCVemail($domain)
    {
        return $this->racent->post('/ssl/DCVemail', [], collect([
            'domain' => $domain,
        ])->toArray());
    }

    /**
     * 获取文件验证信息
     *
     * @param string $orderId 上面订购接口返回的certId(证书id)。注：这里参数名为orderId
     *
     * @throws RacentException
     */
    public function validatefile($orderId)
    {
        return $this->racent->post('/ssl/validatefile', [], collect([
            'orderId' => $orderId,
        ])->toArray());
    }

    /**
     * 获取DNS验证信息
     *
     * @param string $orderId 上面订购接口返回的certId(证书id)。注：这里参数名为orderId
     * @param string $domain 域名
     *
     * @throws RacentException
     */
    public function validatedns($orderId, $domain)
    {
        return $this->racent->post('/ssl/validatedns', [], collect([
            'orderId' => $orderId,
            'domain' => $domain,
        ])->toArray());
    }

    /**
     * 修改 SSL 订阅域名验证方式
     *
     * @param string $certId
     * @param string $domainName
     * @param string $dcvMethod
     * @param string|null $dcvEmail
     *
     * @throws RacentException
     */
    public function updateDCV($certId, $domainName, $dcvMethod, $dcvEmail = null)
    {
        return $this->racent->post('/ssl/updateDCV', [], collect([
            'certId' => $certId,
            'domainName' => $domainName,
            'dcvMethod' => $dcvMethod,
            'dcvEmail' => $dcvEmail,
        ])->filter()->toArray());
    }
}
