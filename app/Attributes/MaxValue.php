<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
class MaxValue extends ValidationRule
{
    public function __construct(
        public readonly float $limit,
        public readonly bool $strict = false
    ) {
    }

    protected function pass($value): bool
    {
        if (!is_array($value)) {
            $value = [$value];
        }
        return $this->strict
            ? max($value) < $this->limit
            : max($value) <= $this->limit;
    }

    protected function message(): string
    {
        return "Your value length can not greater than $this->limit";
    }
}

