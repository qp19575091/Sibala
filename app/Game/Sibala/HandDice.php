<?php

namespace App\Game\Sibala;

use App\Game\Sibala\Matcher\NormalPointMatcher;
use App\Game\Sibala\Matcher\ThreeOfAKindMatcher;
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
        $matcher = new ThreeOfAKindMatcher(
            new NormalPointMatcher(
                new WeakStraightMatcher(null)));

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
}
