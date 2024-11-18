<?php

namespace App\Game\Sibala;

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

        if (count($handDice1) === 2 && count($handDice2) === 2) {
            if (array_key_last($handDice1) > array_key_last($handDice2)) {
                return "Player1 win 100 with 3";
            } else {
                return "Player2 win 100 with 3";
            }
        }
    }

    public function groupByDice($dice): array
    {
        sort($dice);
        $groupByDices = array_count_values($dice);
        arsort($groupByDices);

        return $groupByDices;
    }
}
