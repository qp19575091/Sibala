<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\WeakStraight;
use App\Game\Sibala\Player;

class WeakStraightMatcher extends CategoryMatcher
{
    public function isMatch(array $groupByDices): bool
    {
        return array_keys($groupByDices) === [1, 2, 3];
    }

    public function getMatchCategory(array $groupByDices): Category
    {
        return new WeakStraight();
    }
}
