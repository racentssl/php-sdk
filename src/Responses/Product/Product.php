<?php

namespace Racent\Responses\Product;

use Racent\Responses\PropertySetter;

class Product
{
    use PropertySetter;

    public $code;
    public $productName;
    public $supportWildcard;
    public $supportStandard;
    public $supportIp;
    public $supportSan;
    public $validationType;
    public $maxDomain;
    public $maxYear;
    public $defaultProtectDomain;
    public Price $price;
}
