<?php

namespace App\Game\Sibala;

use App\Game\Attributes\MinValue;

class SiBala
{
    public function __construct(
        #[MinValue(1)]
        private readonly array $dice1,
        private readonly array $dice2,
        private readonly int $bet
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
            ? $player1->name . " win " . $this->bet * $category1->multiplier * $category2->payoutRate . " with " .
            $handDice1->getSingePoint()
            : $player2->name . " win " . $this->bet * $category2->multiplier * $category1->payoutRate . " with " .
            $handDice2->getSingePoint();
    }
}
