<?php

namespace App\Game\Sibala\Category;

use App\Enums\Sibala\CateGoryRank;

abstract class Category
{
    public CateGoryRank $rank;
    public int $multiplier = 1;
    public int $payoutRate = 1;

    public function __construct()
    {
        $this->rank = $this->rank();
    }

    abstract public function rank(): CateGoryRank;
}
