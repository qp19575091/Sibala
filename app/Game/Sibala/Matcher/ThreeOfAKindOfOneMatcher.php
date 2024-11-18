<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\ThreeOfAKindOfOne;
use App\Game\Sibala\HandDice;
use App\Game\Sibala\Player;

class ThreeOfAKindOfOneMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $player): bool
    {
        return $player->isThreeOfAKindOfOne();
    }

    public function getMatchCategory(HandDice $player): Category
    {
        return new ThreeOfAKindOfOne();
    }
}
