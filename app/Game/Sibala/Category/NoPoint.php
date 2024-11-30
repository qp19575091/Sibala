<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryRank;

class NoPoint extends Category
{
    public function rank(): CateGoryRank
    {
        return CateGoryRank::NoPoint;
    }
}
