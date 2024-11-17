<?php

namespace App\Game\Sibala;

use App\Game\Sibala\Category\NoPoint;
use App\Game\Sibala\Category\NormalPoint;
use App\Game\Sibala\Category\ThreeOfAKind;

class Sibala
{
    public function __construct(private $dice1, private $dice2, private $money)
    {
    }

    public function result()
    {
        $player1 = $this->groupByDice($this->dice1);
        $player2 = $this->groupByDice($this->dice2);

        $player1Category = $this->getCategory($player1);
        $player2Category = $this->getCategory($player2);

        // normal point
        if ($player1Category->type === 1 && $player2Category->type === 1) {
            if (array_key_last($player1) > array_key_last($player2)) {
                return "Player1 win 100 with 3";
            } elseif (array_key_last($player1) < array_key_last($player2)) {
                return "Player2 win 100 with 3";
            } else {
                return "Tie";
            }
        }
        // no point and normal point
        if ($player1Category->type === 0 && $player2Category->type === 0) {
            return "Tie";
        } elseif ($player2Category->type === 0) {
            return "Player1 win 100 with 3";
        } elseif ($player1Category->type === 0) {
            return "Player2 win 100 with 3";
        }

        // Three of a kind
        if ($player1Category->type === $player2Category->type) {
            return "Tie";
        }
    }

    public function groupByDice($dice): array
    {
        sort($dice);
        $groupByDices = array_count_values($dice);
        arsort($groupByDices);

        return $groupByDices;
    }

    private function getCategory(array $player)
    {
        if (count($player) === 1) {
            return new ThreeOfAKind();
        } elseif (count($player) === 2) {
            return new NormalPoint();
        } else {
            return new NoPoint();
        }
    }
}
