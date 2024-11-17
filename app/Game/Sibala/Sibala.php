<?php

namespace App\Game\Sibala;

class Sibala
{
    /**
     * @param $player1
     * @param $player2
     * @param $money
     */
    public function __construct(private $player1, private $player2, private $money)
    {
    }

    public function result()
    {
        $player1 = $this->groupByDice($this->player1);
        $player2 = $this->groupByDice($this->player2);

        if (count($player1) === 1 && count($player2) === 1) {
            return "Tie";
        }

        if (count($player1) === 2 && count($player2) === 2) {
            if (array_key_last($player1) > array_key_last($player2)) {
                return "Player1 win 100 with 3";
            } elseif (array_key_last($player1) < array_key_last($player2)) {
                return "Player2 win 100 with 3";
            } else {
                return "Tie";
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
