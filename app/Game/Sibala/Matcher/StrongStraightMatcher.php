<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\StrongStraight;
use App\Game\Sibala\Player;

class StrongStraightMatcher extends CategoryMatcher
{
    public function isMatch(Player $player): bool
    {
        return $player->isStrongStraight();
    }

    public function getMatchCategory(Player $player): Category
    {
        return new StrongStraight();
    }
}
