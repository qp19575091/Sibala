<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\NormalPoint;
use App\Game\Sibala\HandDice;
use App\Game\Sibala\Player;

class NormalPointMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $player): bool
    {
        return $player->isNormalPoint();
    }

    public function getMatchCategory(HandDice $player): Category
    {
        return new NormalPoint();
    }
}
