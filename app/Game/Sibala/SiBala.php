<?php

namespace App\Game\Sibala;

use App\Game\Sibala\Category\NoPoint;
use App\Game\Sibala\Category\NormalPoint;
use App\Game\Sibala\Category\ThreeOfAKind;

class SiBala
{
    public function __construct(
        private readonly array $dice1,
        private readonly array $dice2,
        private readonly int $bet
    ) {
    }

    public function result()
    {
        $handDice1 = $this->groupByDice($this->dice1);
        $handDice2 = $this->groupByDice($this->dice2);

        $category1 = $this->getCategory($handDice1);
        $category2 = $this->getCategory($handDice2);

        // normal category
        if ($category1->type === 1 && $category2->type === 1) {
            if (array_key_last($handDice1) > array_key_last($handDice2)) {
                return "Player1 win 100 with 3";
            } elseif (array_key_last($handDice1) < array_key_last($handDice2)) {
                return "Player2 win 100 with 3";
            } else {
                return "Tie";
            }
        }

        // same category
        if ($category1->type === $category2->type) {
            return "Tie";
        }

        // other category
        if ($category1->type === 0 && $category2->type === 0) {
            return "Tie";
        } elseif ($category2->type === 0) {
            return "Player1 win 100 with 3";
        } elseif ($category1->type === 0) {
            return "Player2 win 100 with 3";
        }
    }

    public function groupByDice($dice): array
    {
        sort($dice);
        $groupByDices = array_count_values($dice);
        arsort($groupByDices);

        return $groupByDices;
    }

    private function getCategory(array $handDice)
    {
        if (count($handDice) === 1) {
            return new ThreeOfAKind();
        } elseif (count($handDice) === 2) {
            return new NormalPoint();
        } else {
            return new NoPoint();
        }
    }
}
