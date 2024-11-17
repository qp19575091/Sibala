<?php

namespace App\Game\Sibala\Category;

class StrongStraight extends Category
{
    public int $multiplier = 2;
    public function type(): int
    {
        return 2;
    }
}
