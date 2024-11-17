<?php

namespace App\Game\Sibala\Category;

class ThreeOfAKind extends Category
{
    public int $multiplier = 3;

    public function type(): int
    {
        return 3;
    }
}
