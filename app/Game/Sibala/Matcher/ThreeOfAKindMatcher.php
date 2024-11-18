<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\ThreeOfAKind;

class ThreeOfAKindMatcher extends CategoryMatcher
{
    public function isMatch(array $groupByDices): bool
    {
        return count($groupByDices) === 1;
    }

    public function getMatchCategory(): Category
    {
        return new ThreeOfAKind();
    }
}
