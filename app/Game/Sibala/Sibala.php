<?php

namespace App\Game\Sibala;

//use App\Attributes\MaxLength;
use App\Attributes\MaxValue;
//use App\Attributes\MinLength;
use App\Attributes\MinValue;

class Sibala
{
    public function __construct(
        #[MinValue(1)]
        #[MaxValue(7)]
        private $dice1,
        #[MaxValue(7)]
        #[MinValue(1)]
        private $dice2,
        private $money
    ) {
    }

    public function result(): string
    {
        $player1 = new Player($this->dice1, "Player1");
        $player2 = new Player($this->dice2, "Player2");

        $player1Category = $player1->getCategory();
        $player2Category = $player2->getCategory();

        $comparer = new Comparer($player1, $player2);
        $compareResult = $comparer->getResult();

        if ($compareResult === 0) {
            return "Tie";
        }

        return $compareResult > 0
            ? $player1->name . " win " . $this->money * $player1Category->multiplier * $player2Category->payoutRate . " with " .
            $player1->getSingePoint()
            : $player2->name . " win " . $this->money * $player2Category->multiplier * $player1Category->payoutRate . " with " . $player2->getSingePoint();
    }
}
