<?php

namespace App\Game\Sibala\Category;

class ThreeOfAKindOfOne extends Category
{
    public int $multiplier = 5;

    public function type(): int
    {
        return 5;
    }
}
