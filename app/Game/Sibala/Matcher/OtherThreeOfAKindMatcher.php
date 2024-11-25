<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\OtherThreeOfAKind;
use App\Game\Sibala\HandDice;

class OtherThreeOfAKindMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $handDice): bool
    {
        return  $handDice->isThreeOfAKind();
    }

    public function getMatchCategory(): Category
    {
        return new OtherThreeOfAKind();
    }
}
