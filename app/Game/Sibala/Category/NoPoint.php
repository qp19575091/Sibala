<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryType;

class NoPoint extends Category
{
    public function type(): CateGoryType
    {
        return CateGoryType::NoPoint;
    }
}
