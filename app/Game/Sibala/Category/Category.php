<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryType;

abstract class Category
{
    public CateGoryType $type;
    public int $multiplier = 1;
    public int $payoutRate = 1;

    public function __construct()
    {
        $this->type = $this->type();
    }

    abstract public function type(): CateGoryType;
}
