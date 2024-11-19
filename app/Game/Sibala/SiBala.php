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

        $handDice1 = $player1->getHandDice();
        $handDice2 = $player2->getHandDice();

        $category1 = $handDice1->getCategory();
        $category2 = $handDice2->getCategory();

        $comparer = new Comparer($player1, $player2);
        $compareResult = $comparer->getResult();

        if ($compareResult === 0) {
            return "Tie";
        }

        $winner = $comparer->getWinner();

        return $winner->name . " win " . $this->bet * $category1->multiplier * $category2->payoutRate . " with " .
            $winner->getHandDice()->getSingePoint();
    }
}
