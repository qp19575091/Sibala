<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryType;

class ThreeOfAKindOfOne extends Category
{
    public int $multiplier = 5;

    public function type(): CateGoryType
    {
        return CateGoryType::ThreeOfAKindOfOne;
    }
}
