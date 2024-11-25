<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\StrongStraight;
use App\Game\Sibala\HandDice;

class StrongStraightMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $handDice): bool
    {
        return $handDice->isStrongStraight();
    }

    public function getMatchCategory(): Category
    {
        return new StrongStraight();
    }
}
