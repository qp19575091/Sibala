<?php

namespace App\Game\Sibala\Matcher;


use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\NoPoint;
use App\Game\Sibala\HandDice;

abstract class CategoryMatcher
{
    public function __construct(
        private readonly ?CategoryMatcher $nextMatcher
    ) {
    }

    public function decidedCategory(HandDice $handDice)
    {
        if ($this->isMatch($handDice)) {
            return $this->getMatchCategory();
        }
        return $this->nextMatcher !== null
            ? $this->nextMatcher->decidedCategory($handDice)
            : new NoPoint();
    }

    abstract public function isMatch(HandDice $handDice): bool;

    abstract public function getMatchCategory(): Category;
}
