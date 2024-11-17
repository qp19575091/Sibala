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
        $player1 = new Player($this->dice1, "Player1");
        $player2 = new Player($this->dice2, "Player2");

        $player1Category = $player1->getCategory();
        $player2Category = $player2->getCategory();

        // normal point
        if ($player1Category->type === 1 && $player2Category->type === 1) {
            if ($player1->getSingePoint() > $player2->getSingePoint()) {
                return "Player1 win 100 with 3";
            } elseif ($player1->getSingePoint() < $player2->getSingePoint()) {
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
}
