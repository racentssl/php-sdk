<?php

namespace Racent\Responses\Product;

use Racent\Responses\Product\Price\SanPrice;
use Racent\Responses\Product\Price\BasePrice;
use Racent\Responses\PropertySetter;

class Price
{
    use PropertySetter;

    public BasePrice $basePrice;
    public SanPrice $sanPrice;
}
