<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\ThreeOfAKindOfOne;
use App\Game\Sibala\HandDice;

class ThreeOfAKindOfOneMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $handDice): bool
    {
        return $handDice->isThreeOfAKindOfOne();
    }

    public function getMatchCategory(): Category
    {
        return new ThreeOfAKindOfOne();
    }
}
