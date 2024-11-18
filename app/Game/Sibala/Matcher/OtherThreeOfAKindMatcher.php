<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\OtherThreeOfAKind;
use App\Game\Sibala\HandDice;
use App\Game\Sibala\Player;

class OtherThreeOfAKindMatcher extends CategoryMatcher
{
    public function isMatch(HandDice $player): bool
    {
        return $player->isThreeOfAKind();
    }

    public function getMatchCategory(HandDice $player): Category
    {
        return new OtherThreeOfAKind();
    }
}
