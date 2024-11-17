<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\ThreeOfAKindOfOne;
use App\Game\Sibala\Player;

class ThreeOfAKindOfOneMatcher extends CategoryMatcher
{
    public function isMatch(Player $player): bool
    {
        return $player->isThreeOfAKindOfOne();
    }

    public function getMatchCategory(Player $player): Category
    {
        return new ThreeOfAKindOfOne();
    }
}
