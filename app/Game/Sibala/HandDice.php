<?php

namespace App\Game\Sibala;

use App\Game\Sibala\Matcher\NormalPointMatcher;
use App\Game\Sibala\Matcher\OtherThreeOfAKindMatcher;
use App\Game\Sibala\Matcher\StrongStraightMatcher;
use App\Game\Sibala\Matcher\ThreeOfAKindOfOneMatcher;
use App\Game\Sibala\Matcher\WeakStraightMatcher;

class HandDice
{
    private array $groupByDices;

    public function __construct(array $dice)
    {
        sort($dice);
        $groupByDices = array_count_values($dice);
        arsort($groupByDices);

        $this->groupByDices = $groupByDices;
    }

    public function getCategory()
    {
        $match = new ThreeOfAKindOfOneMatcher(
            new OtherThreeOfAKindMatcher(
                new StrongStraightMatcher(
                    new NormalPointMatcher(
                        new WeakStraightMatcher(null)))));


        return $match->decidedCategory($this);
    }

    public function getSingePoint(): int
    {
        return array_key_last($this->groupByDices);
    }

    public function isNormalPoint(): bool
    {
        return count($this->groupByDices) === 2;
    }

    public function isThreeOfAKind(): bool
    {
        return count($this->groupByDices) === 1;
    }

    public function isWeakStraight(): bool
    {
        return array_keys($this->groupByDices) === [1, 2, 3];
    }

    public function isStrongStraight(): bool
    {
        return array_keys($this->groupByDices) === [4, 5, 6];
    }

    public function isThreeOfAKindOfOne(): int
    {
        return count($this->groupByDices) === 1 & array_key_first($this->groupByDices) === 1;
    }
}