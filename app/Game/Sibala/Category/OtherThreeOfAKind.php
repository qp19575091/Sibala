<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryType;

class OtherThreeOfAKind extends Category
{
    public int $multiplier = 3;
    public function type(): CateGoryType
    {
        return CateGoryType::OtherThreeOfAKind;
    }
}
