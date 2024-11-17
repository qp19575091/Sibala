<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
class MinValue
{
    public function __construct(
        public readonly float $limit
    ) {
    }

    public function validate($value)
    {
        if (!is_array($value)) {
            $value = [$value];
        }
        if (min($value) >= $this->limit) {
            return true;
        } else {
            throw new \Exception();
        }
    }
}
