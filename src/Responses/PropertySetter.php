<?php

namespace Racent\Responses;

trait PropertySetter
{
    public function __construct($data, $baseClass = null)
    {
        if (!$baseClass) {
            $arr = explode('\\', get_class($this));
            array_pop($arr);
            $baseClass = implode('\\', $arr);
        }

        foreach ($data as $property => $value) {
            if (is_object($value)) {
                $className = $baseClass . '\\' . ucfirst($property);
                $this->{$property} = new $className($value, $className);
                continue;
            }

            $this->{$property} = $value;
        }
    }
}
