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

        return $this->compareResult($player1, $player2);
    }

    private function compareResult(Player $player1, Player $player2)
    {
        $handDice1 = $player1->getHandDice();
        $handDice2 = $player2->getHandDice();

        $category1 = $handDice1->getCategory();
        $category2 = $handDice2->getCategory();

        if ($category1->type === $category2->type && $category1->type === 1) {
            return $this->compareNormalPoint($player1, $player2);
        }

        if ($category1->type === $category2->type) {
            return "Tie";
        }

        if ($category1->type > $category2->type) {
            return $player1->name . " win 100 with " . $handDice1->getSingePoint();
        } elseif ($category1->type < $category2->type) {
            return $player2->name . " win 100 with " . $handDice2->getSingePoint();
        }
    }

    private function compareNormalPoint(Player $player1, Player $player2)
    {
        $handDice1 = $player1->getHandDice();
        $handDice2 = $player2->getHandDice();

        if ($handDice1->getSingePoint() > $handDice2->getSingePoint()) {
            return $player1->name . " win 100 with " . $handDice1->getSingePoint();
        } elseif ($handDice1->getSingePoint() < $handDice2->getSingePoint()) {
            return $player2->name . " win 100 with " . $handDice2->getSingePoint();
        } else {
            return "Tie";
        }
    }
}
