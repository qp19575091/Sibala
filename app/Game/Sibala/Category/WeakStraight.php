<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryRank;

class WeakStraight extends Category
{
    public int $payoutRate = 2;

    public function rank(): CateGoryRank
    {
        return CateGoryRank::WeakStraight;
    }
}
