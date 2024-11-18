<?php

namespace App\Game\Sibala;

use App\Attributes\MaxLength;
use App\Attributes\MaxValue;
use App\Attributes\MinLength;
use App\Attributes\MinValue;

class Sibala
{
    public function __construct(
        #[MinValue(1)] #[MaxValue(6)] #[MinLength(3)] #[MaxLength(3)]
        private $dice1,
        #[MaxValue(6)] #[MinValue(1)] #[MinLength(3)] #[MaxLength(3)]
        private $dice2,
        #[MinValue(0)]
        private $money
    ) {
    }

    public function result(): string
    {
        $player1 = new Player($this->dice1, "Player1");
        $player2 = new Player($this->dice2, "Player2");

        $handDice1 = $player1->getHandDice();
        $handDice2 = $player2->getHandDice();

        $category1 = $handDice1->getCategory();
        $category2 = $handDice2->getCategory();

        $comparer = new Comparer($handDice1, $handDice2);
        $compareResult = $comparer->getResult();

        if ($compareResult === 0) {
            return "Tie";
        }

        return $compareResult > 0
            ? $player1->name . " win " . $this->money * $category1->multiplier * $category2->payoutRate . " with " .
            $handDice1->getSingePoint()
            : $player2->name . " win " . $this->money * $category2->multiplier * $category1->payoutRate . " with " .
            $handDice2->getSingePoint();
    }
}
