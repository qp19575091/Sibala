<?php

namespace App\Game\Sibala\Category;

abstract class Category
{
    public int $type;
    public int $multiplier = 1;
    public int $payoutRate = 1;

    public function __construct()
    {
        $this->type = $this->type();
    }

    abstract public function type(): int;
}
