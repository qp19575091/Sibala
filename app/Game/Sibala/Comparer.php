<?php

namespace App\Game\Sibala;

class Comparer
{
    public function __construct(
        private readonly Player $player1,
        private readonly Player $player2
    ) {
    }

    public function getResult(): int
    {
        $handDice1 = $this->player1->getHandDice();
        $handDice2 = $this->player2->getHandDice();

        $category1 = $handDice1->getCategory();
        $category2 = $handDice2->getCategory();

        $compareResult = $category1->type->value - $category2->type->value;

        if ($compareResult === 0 && $handDice1->isNormalPoint()) {
            return $handDice1->getSingePoint() - $handDice2->getSingePoint();
        }

        return $compareResult;
    }

    public function getWinner(): Player
    {
        return $this->getResult() > 0
            ? $this->player1
            : $this->player2;
    }
}
