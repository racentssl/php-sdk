<?php

namespace Racent\Traits;

use Racent\Racent;

trait RacentResources
{
    /**
     * @var Racent
     */
    protected $racent = null;

    /**
     * 构造
     *
     * @param Racent $racent
     */
    public function __construct(Racent $racent)
    {
        $this->racent = $racent;
    }
}
