<?php

namespace App\Game\Attributes;

use Attribute;

#[Attribute]
class MaxValue extends ValidationRule
{
    public function __construct(
        public readonly float $limit
    ) {
    }

    protected function pass($value): bool
    {
        if (!is_array($value)) {
            $value = [$value];
        }
        return max($value) <= $this->limit;
    }

    protected function message(): string
    {
        return "Your value length can not greater than $this->limit";
    }
}
