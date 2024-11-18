<?php

namespace App\Game\Sibala;

use App\Game\Sibala\Category\NoPoint;
use App\Game\Sibala\Category\NormalPoint;
use App\Game\Sibala\Category\ThreeOfAKind;

class HandDice
{
    private array $groupByDice;

    public function __construct($dice)
    {
        $this->groupByDice = $this->groupByDice($dice);
    }

    public function getCategory()
    {
        if (count($this->groupByDice) === 1) {
            return new ThreeOfAKind();
        } elseif (count($this->groupByDice) === 2) {
            return new NormalPoint();
        } else {
            return new NoPoint();
        }
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


    public function isNormalPoint()
    {
        return count($this->groupByDice) === 2;
    }
}
