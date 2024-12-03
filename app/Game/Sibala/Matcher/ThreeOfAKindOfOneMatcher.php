<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\ThreeOfAKindOfOne;
use App\Game\Sibala\DiceHand;

class ThreeOfAKindOfOneMatcher extends CategoryMatcher
{
    public function isMatch(DiceHand $diceHand): bool
    {
        return $diceHand->isThreeOfAKindOfOne();
    }

    public function getMatchCategory(): Category
    {
        return new ThreeOfAKindOfOne();
    }
}
