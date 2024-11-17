<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\WeakStraight;
use App\Game\Sibala\Player;

class WeakStraightMatcher extends CategoryMatcher
{
    public function isMatch(Player $player): bool
    {
        return $player->isWeakStraight();
    }

    public function getMatchCategory(Player $player): Category
    {
        return new WeakStraight();
    }
}
