<?php

namespace App\Game\Sibala;

class Comparer
{
    public function __construct(
        private readonly HandDice $handDice1,
        private readonly HandDice $handDice2
    ) {
    }

    public function getResult(): int
    {
        $player1Category = $this->handDice1->getCategory();
        $player2Category = $this->handDice2->getCategory();

        if ($player1Category->type === $player2Category->type && $this->handDice1->isNormalPoint()) {
            return $this->compareSinglePoint();
        }

        if ($player1Category->type === $player2Category->type) {
            return 0;
        }

        return $player1Category->type > $player2Category->type
            ? 1
            : -1;
    }

    private function compareSinglePoint(): int
    {
        if ($this->handDice1->getSingePoint() === $this->handDice2->getSingePoint()) {
            return 0;
        }

        return $this->handDice1->getSingePoint() > $this->handDice2->getSingePoint()
            ? 1
            : -1;
    }
}
