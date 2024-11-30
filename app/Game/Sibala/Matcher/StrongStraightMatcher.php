<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\StrongStraight;
use App\Game\Sibala\DiceHand;

class StrongStraightMatcher extends CategoryMatcher
{
    public function isMatch(DiceHand $diceHand): bool
    {
        return $diceHand->isStrongStraight();
    }

    public function getMatchCategory(): Category
    {
        return new StrongStraight();
    }
}
