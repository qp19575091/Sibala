<?php

namespace App\Game\Attributes;

use Attribute;

#[Attribute]
class MaxLength extends ValidationRule
{
    public function __construct(
        public readonly float $limit,
        public readonly bool $strict = false
    ) {
    }

    protected function pass($value): bool
    {
        if (is_array($value)) {
            return $this->strict
                ? count($value) < $this->limit
                : count($value) <= $this->limit;
        }

        if (is_string($value)) {
            return $this->strict
                ? strlen($value) < $this->limit
                : strlen($value) <= $this->limit;
        }

        return false;
    }

    protected function message(): string
    {
        return "Your value length can not over than $this->limit";
    }
}
