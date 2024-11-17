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
        $player1Category = $this->player1->getCategory();
        $player2Category = $this->player2->getCategory();

        if ($player1Category->type === $player2Category->type && $this->player1->isNormalPoint()) {
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
        if ($this->player1->getSingePoint() === $this->player2->getSingePoint()) {
            return 0;
        }

        return $this->player1->getSingePoint() > $this->player2->getSingePoint()
            ? 1
            : -1;
    }
}
