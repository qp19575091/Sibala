<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\WeakStraight;
use App\Game\Sibala\HandDice;

class WeakStraightMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $handDice): bool
    {
        return $handDice->isWeakStraight();
    }

    public function getMatchCategory(): Category
    {
        return new WeakStraight();
    }
}
