<?php

namespace App\Game\Sibala;

use App\Game\Sibala\Matcher\NormalPointMatcher;
use App\Game\Sibala\Matcher\ThreeOfAKindMatcher;
use App\Game\Sibala\Matcher\WeakStraightMatcher;

class Player
{
    private array $groupByDices;

    public function __construct(public $dice, public $name)
    {
        sort($dice);
        $groupByDices = array_count_values($dice);
        arsort($groupByDices);

        $this->groupByDices = $groupByDices;
    }

    public function getCategory()
    {
        $match = new ThreeOfAKindMatcher(
            new NormalPointMatcher(
                new WeakStraightMatcher(null)));

        return $match->decidedCategory($this->groupByDices);
    }

    public function getSingePoint(): int
    {
        return array_key_last($this->groupByDices);
    }

    public function isNormalPoint(): bool
    {
        return count($this->groupByDices) === 2;
    }
}
