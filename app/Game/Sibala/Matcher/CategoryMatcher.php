<?php

namespace App\Game\Sibala\Matcher;


use App\Game\Sibala\Category\Category;
use App\Game\Sibala\Category\NoPoint;

abstract class CategoryMatcher
{
    public function __construct(
        private readonly ?CategoryMatcher $nextMatcher
    ) {
    }

    public function decidedCategory(array $groupByDices)
    {
        if ($this->isMatch($groupByDices)) {
            return $this->getMatchCategory($groupByDices);
        }
        return $this->nextMatcher !== null
            ? $this->nextMatcher->decidedCategory($groupByDices)
            : new NoPoint();
    }

    abstract public function isMatch(array $groupByDices): bool;

    abstract public function getMatchCategory(): Category;
}
