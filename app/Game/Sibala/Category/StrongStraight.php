<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryType;

class StrongStraight extends Category
{
    public int $multiplier = 2;

    public function type(): CateGoryType
    {
        return CateGoryType::StrongStraight;
    }
}
