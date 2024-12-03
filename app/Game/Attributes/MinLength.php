<?php

namespace App\Game\Attributes;

use Attribute;

#[Attribute]
class MinLength extends ValidationRule
{
    public function __construct(
        public readonly float $limit,
    ) {
    }

    protected function pass($value): bool
    {
        if (is_array($value)) {
            return count($value) >= $this->limit;
        }

        if (is_string($value)) {
            return strlen($value) >= $this->limit;
        }

        return false;
    }

    protected function message(): string
    {
        return "Your value length can not short than $this->limit";
    }
}
