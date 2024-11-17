<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\NormalPoint;
use App\Game\Sibala\Player;

class NormalPointMatcher extends CategoryMatcher
{
    public function isMatch(Player $player): bool
    {
        return $player->isNormalPoint();
    }

    public function getMatchCategory(Player $player): Category
    {
        return new NormalPoint();
    }
}
