<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\WeakStraight;
use App\Game\Sibala\HandDice;
use App\Game\Sibala\Player;

class WeakStraightMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $player): bool
    {
        return $player->isWeakStraight();
    }

    public function getMatchCategory(HandDice $player): Category
    {
        return new WeakStraight();
    }
}
