<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryRank;

class NormalPoint extends Category
{
    public function rank(): CateGoryRank
    {
        return CateGoryRank::NormalPoint;
    }
}
