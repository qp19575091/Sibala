<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\WeakStraight;
use App\Game\Sibala\DiceHand;

class WeakStraightMatcher extends CategoryMatcher
{
    public function isMatch(DiceHand $diceHand): bool
    {
        return $diceHand->isWeakStraight();
    }

    public function getMatchCategory(): Category
    {
        return new WeakStraight();
    }
}
