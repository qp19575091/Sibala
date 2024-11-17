<?php

namespace App\Game\Sibala;

class Sibala
{
    public function __construct(
        private $dice1,
        private $dice2,
        private $money
    ) {
    }

    public function result(): string
    {
        $player1 = new Player($this->dice1, "Player1");
        $player2 = new Player($this->dice2, "Player2");

        $comparer = new Comparer($player1, $player2);
        $compareResult = $comparer->getResult();

        if ($compareResult === 0) {
            return "Tie";
        }

        return $compareResult > 0
            ? $player1->name . " win 100 with " . $player1->getSingePoint()
            : $player2->name . " win 100 with " . $player2->getSingePoint();
    }
}
