<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\NormalPoint;
use App\Game\Sibala\HandDice;

class NormalPointMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $handDice): bool
    {
        return $handDice->isNormalPoint();
    }

    public function getMatchCategory(): Category
    {
        return new NormalPoint();
    }
}
