<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryRank;

class OtherThreeOfAKind extends Category
{
    public int $multiplier = 3;
    public function rank(): CateGoryRank
    {
        return CateGoryRank::OtherThreeOfAKind;
    }
}
