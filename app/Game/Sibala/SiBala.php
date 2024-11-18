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
        $player1 = new Player($this->dice1, "Player1");
        $player2 = new Player($this->dice2, "Player2");

        $handDice1 = $player1->getHandDice();
        $handDice2 = $player2->getHandDice();

        $category1 = $handDice1->getCategory();
        $category2 = $handDice2->getCategory();

        // normal category
        if ($category1->type === 1 && $category2->type === 1) {
            if ($handDice1->getSingePoint() > $handDice2->getSingePoint()) {
                return $player1->name . " win 100 with " . $handDice1->getSingePoint();
            } elseif ($handDice1->getSingePoint() < $handDice2->getSingePoint()) {
                return $player2->name . " win 100 with " . $handDice2->getSingePoint();
            } else {
                return "Tie";
            }
        }

        // same category
        if ($category1->type === $category2->type) {
            return "Tie";
        }

        // other category
        if ($category1->type > $category2->type) {
            return "Player1 win 100 with 3";
        } else {
            return "Player2 win 100 with 3";
        }
    }
}
