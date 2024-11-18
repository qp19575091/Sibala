<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\StrongStraight;
use App\Game\Sibala\HandDice;
use App\Game\Sibala\Player;

class StrongStraightMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $player): bool
    {
        return $player->isStrongStraight();
    }

    public function getMatchCategory(HandDice $player): Category
    {
        return new StrongStraight();
    }
}
