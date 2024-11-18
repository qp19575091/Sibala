<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\NoPoint;
use App\Game\Sibala\HandDice;
use App\Game\Sibala\Player;

abstract class CategoryMatcher
{
    public function __construct(
        private readonly ?CategoryMatcher $nextMatcher
    ) {
    }

    public function decidedCategory(HandDice $player)
    {
        if ($this->isMatch($player)) {
            return $this->getMatchCategory($player);
        }
        return $this->nextMatcher !== null
            ? $this->nextMatcher->decidedCategory($player)
            : new NoPoint();
    }

    abstract public function isMatch(HandDice $player): bool;

    abstract public function getMatchCategory(HandDice $player): Category;
}
