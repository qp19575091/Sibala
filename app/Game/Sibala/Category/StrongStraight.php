<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryRank;

class StrongStraight extends Category
{
    public int $multiplier = 2;

    public function rank(): CateGoryRank
    {
        return CateGoryRank::StrongStraight;
    }
}
