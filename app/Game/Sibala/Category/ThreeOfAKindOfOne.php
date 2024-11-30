<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryRank;

class ThreeOfAKindOfOne extends Category
{
    public int $multiplier = 5;

    public function rank(): CateGoryRank
    {
        return CateGoryRank::ThreeOfAKindOfOne;
    }
}
