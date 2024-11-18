<?php

namespace App\Game\Attributes;

use Attribute;

#[Attribute]
abstract class ValidationRule
{

    protected abstract function pass($value): bool;
    protected abstract function message(): string;
    /**
     * @throws \Exception
     */
    public function validate($value): void
    {
        if (!$this->pass($value)) {
            throw new \Exception($this->message());
        }
    }
}
