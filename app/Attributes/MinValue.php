<?php

namespace App\Attributes;

use Attribute;

#[Attribute]
class MinValue extends ValidationRule
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
            ? min($value) > $this->limit
            : min($value) >= $this->limit;
    }

    protected function message(): string
    {
        return "Your value length can not less than $this->limit";
    }
}
