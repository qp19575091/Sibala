<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\OtherThreeOfAKind;
use App\Game\Sibala\DiceHand;

class OtherThreeOfAKindMatcher extends CategoryMatcher
{
    public function isMatch(DiceHand $diceHand): bool
    {
        return  $diceHand->isThreeOfAKind();
    }

    public function getMatchCategory(): Category
    {
        return new OtherThreeOfAKind();
    }
}
