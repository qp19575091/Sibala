<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryType;

class WeakStraight extends Category
{
    public int $payoutRate = 2;

    public function type(): CateGoryType
    {
        return CateGoryType::WeakStraight;
    }
}
