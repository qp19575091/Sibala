<?php

namespace App\Game\Sibala\Category;

class WeakStraight extends Category
{
    public int $payoutRate = 2;

    public function type(): int
    {
        return 0;
    }
}
