<?php

namespace App\Game\Sibala;

use App\Game\Sibala\Category\NoPoint;
use App\Game\Sibala\Category\NormalPoint;
use App\Game\Sibala\Category\ThreeOfAKind;
use App\Game\Sibala\Category\WeakStraight;

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
        if (count($this->groupByDices) === 1) {
            return new ThreeOfAKind();
        } elseif (count($this->groupByDices) === 2) {
            return new NormalPoint();
        } elseif (array_keys($this->groupByDices) === [1, 2, 3]) {
            return new WeakStraight();
        } else {
            return new NoPoint();
        }
    }

    public function getSingePoint(): int
    {
        return array_key_last($this->groupByDices);
    }

    public function isNormalPoint()
    {
        return count($this->groupByDices) === 2;
    }
}
