<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryType;

class NormalPoint extends Category
{
    public function type(): CateGoryType
    {
        return CateGoryType::NormalPoint;
    }
}
