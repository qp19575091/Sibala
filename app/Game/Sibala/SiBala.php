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

        $compareResult = $this->compareResult($player1, $player2);
        if ($compareResult === 0) {
            return "Tie";
        }

        return $compareResult > 0
            ? $player1->name . " win 100 with " . $handDice1->getSingePoint()
            : $player2->name . " win 100 with " . $handDice2->getSingePoint();
    }

    private function compareResult(Player $player1, Player $player2)
    {
        $handDice1 = $player1->getHandDice();
        $handDice2 = $player2->getHandDice();

        $category1 = $handDice1->getCategory();
        $category2 = $handDice2->getCategory();

        if ($category1->type === $category2->type && $handDice1->isNormalPoint()) {
            return $this->compareNormalPoint($handDice1, $handDice2);
        }

        if ($category1->type === $category2->type) {
            return 0;
        }

        return $category1->type > $category2->type
            ? 1
            : -1;
    }

    private function compareNormalPoint(HandDice $handDice1, HandDice $handDice2)
    {
        if ($handDice1->getSingePoint() === $handDice2->getSingePoint()) {
            return 0;
        }
        return $handDice1->getSingePoint() > $handDice2->getSingePoint()
            ? 1
            : -1;

    }
}
