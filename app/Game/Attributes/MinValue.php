<?php


namespace App\Game\Attributes;

use Attribute;

#[Attribute]
class MinValue extends ValidationRule
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
        return min($value) >= $this->limit;
    }

    protected function message(): string
    {
        return "Your value length can not less than $this->limit";
    }
}
