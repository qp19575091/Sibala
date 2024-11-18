<?php

namespace App\Game\Attributes;

use Attribute;

#[Attribute]
class MaxValue
{
    public function __construct(
        public readonly float $limit
    ) {
    }

    public function validate($value): bool
    {
        if (!is_array($value)) {
            $value = [$value];
        }
        if (max($value) <= $this->limit) {
            return true;
        } else {
            throw new \Exception();
        }
    }
}
