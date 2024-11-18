<?php

namespace App\Game\Sibala;

use App\Game\Sibala\Matcher\NormalPointMatcher;
use App\Game\Sibala\Matcher\StrongStraightMatcher;
use App\Game\Sibala\Matcher\OtherThreeOfAKindMatcher;
use App\Game\Sibala\Matcher\ThreeOfAKindOfOneMatcher;
use App\Game\Sibala\Matcher\WeakStraightMatcher;

class HandDice
{
    private array $groupByDice;

    public function __construct($dice)
    {
        $this->groupByDice = $this->groupByDice($dice);
    }

    public function getCategory()
    {
        $matcher = new ThreeOfAKindOfOneMatcher(
            new OtherThreeOfAKindMatcher(
                new StrongStraightMatcher(
                    new NormalPointMatcher(
                        new WeakStraightMatcher(null)))));

        return $matcher->decidedCategory($this);
    }

    public function groupByDice($dice): array
    {
        sort($dice);
        $groupByDices = array_count_values($dice);
        arsort($groupByDices);

        return $groupByDices;
    }

    public function getSingePoint(): int
    {
        return array_key_last($this->groupByDice);
    }

    public function isNormalPoint(): bool
    {
        return count($this->groupByDice) === 2;
    }

    public function isThreeOfAKind(): bool
    {
        return count($this->groupByDice) === 1;
    }

    public function isWeakStraight(): bool
    {
        return array_keys($this->groupByDice) === [1, 2, 3];
    }

    public function isStrongStraight(): bool
    {
        return array_keys($this->groupByDice) === [4, 5, 6];
    }

    public function isThreeOfAKindOfOne(): int
    {
        return $this->isThreeOfAKind() & array_key_first($this->groupByDice) === 1;
    }
}
