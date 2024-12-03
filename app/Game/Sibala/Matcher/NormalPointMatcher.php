<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\NormalPoint;
use App\Game\Sibala\DiceHand;

class NormalPointMatcher extends CategoryMatcher
{
    public function isMatch(DiceHand $diceHand): bool
    {
        return $diceHand->isNormalPoint();
    }

    public function getMatchCategory(): Category
    {
        return new NormalPoint();
    }
}
