<?php

namespace Racent;

use Racent\Exceptions\RacentException;
use Racent\Responses\Product\Product;
use Racent\Traits\RacentResources;

class RacentProduct
{
    use RacentResources;

    /**
     * 获取产品和列表
     *
     * @param string $vendor 根据品牌获取，sectigo此项为Sectigo
     *
     * @throws RacentException
     */
    public function list($vendor)
    {
        $list = $this->racent->post('/ssl/productList', [], [
            'vendor' => $vendor,
        ]);
        $products = [];
        foreach ($list as $key => $value) {
            $product = new Product($value);
            $products[$product->code] = $product;
        }

        unset($list);
        return $products;
    }
}
