<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\ThreeOfAKind;
use App\Game\Sibala\HandDice;

class ThreeOfAKindMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $handDice): bool
    {
        return  $handDice->isThreeOfAKind();
    }

    public function getMatchCategory(): Category
    {
        return new ThreeOfAKind();
    }
}
