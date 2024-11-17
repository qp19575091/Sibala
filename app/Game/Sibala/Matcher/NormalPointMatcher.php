<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\NormalPoint;
use App\Game\Sibala\Player;

class NormalPointMatcher extends CategoryMatcher
{
    public function isMatch(array $groupByDices): bool
    {
        return count($groupByDices) === 2;
    }

    public function getMatchCategory(array $groupByDices): Category
    {
        return new NormalPoint();
    }
}
