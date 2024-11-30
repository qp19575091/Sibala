<?php

namespace App\Game\Sibala;

use App\Game\Attributes\MinValue;
use App\Game\Attributes\MaxValue;
use App\Game\Attributes\MinLength;
use App\Game\Attributes\MaxLength;

class SiBala
{
    public function __construct(
        #[MinValue(1)] #[MaxValue(6)] #[MinLength(3)] #[MaxLength(3)]
        private readonly array $dice1,
        #[MinValue(1)] #[MaxValue(6)] #[MinLength(3)] #[MaxLength(3)]
        private readonly array $dice2,
        #[MinValue(0)]
        private readonly int $bet
    ) {
    }

    public function result(): string
    {
        $player1 = new Player($this->dice1, "Player1");
        $player2 = new Player($this->dice2, "Player2");

        $diceHand1 = $player1->getDiceHand();
        $diceHand2 = $player2->getDiceHand();

        $comparer = new Comparer($diceHand1, $diceHand2);
        $compareResult = $comparer->getResult();

        if ($compareResult === 0) {
            return "Tie";
        }

        $category1 = $diceHand1->getCategory();
        $category2 = $diceHand2->getCategory();

        return $compareResult > 0
            ? $player1->name . " win " . $this->bet * $category1->multiplier * $category2->payoutRate . " with " .
            $diceHand1->getSingePoint()
            : $player2->name . " win " . $this->bet * $category2->multiplier * $category1->payoutRate . " with " .
            $diceHand2->getSingePoint();
    }
}
