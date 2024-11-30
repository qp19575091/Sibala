<?php

namespace App\Game\Sibala\Matcher;

use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\NoPoint;
use App\Game\Sibala\DiceHand;

abstract class CategoryMatcher
{
    public function __construct(
        private readonly ?CategoryMatcher $nextMatcher
    ) {
    }

    public function decidedCategory(DiceHand $diceHand)
    {
        if ($this->isMatch($diceHand)) {
            return $this->getMatchCategory();
        }
        return is_null($this->nextMatcher)
            ? new NoPoint()
            : $this->nextMatcher->decidedCategory($diceHand);
    }

    abstract public function isMatch(DiceHand $diceHand): bool;

    abstract public function getMatchCategory(): Category;
}
