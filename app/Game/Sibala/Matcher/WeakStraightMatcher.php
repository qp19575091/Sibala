<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\WeakStraight;

class WeakStraightMatcher extends CategoryMatcher
{
    public function isMatch(array $groupByDices): bool
    {
        return array_keys($groupByDices) === [1, 2, 3];
    }

    public function getMatchCategory(): Category
    {
        return new WeakStraight();
    }
}
