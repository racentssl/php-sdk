<?php

namespace Racent\Responses\Product\Price;

use Racent\Responses\Product\Price\SanPrice\BasePrice;
use Racent\Responses\Product\Price\SanPrice\NormalPrice;
use Racent\Responses\Product\Price\SanPrice\WildPrice;
use Racent\Responses\PropertySetter;

class SanPrice
{
    use PropertySetter;

    public WildPrice $wildPrice;
    public BasePrice $basePrice;
    public NormalPrice $normalPrice;
}
