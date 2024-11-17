<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\OtherThreeOfAKind;
use App\Game\Sibala\Player;

class OtherThreeOfAKindMatcher extends CategoryMatcher
{
    public function isMatch(Player $player): bool
    {
        return $player->isThreeOfAKind();
    }

    public function getMatchCategory(Player $player): Category
    {
        return new OtherThreeOfAKind();
    }
}