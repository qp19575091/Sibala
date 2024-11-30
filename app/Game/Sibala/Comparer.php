<?php

namespace App\Game\Sibala;

class Comparer
{
    public function __construct(
        private readonly DiceHand $diceHand1,
        private readonly DiceHand $diceHand2
    ) {
    }

    public function getResult(): int
    {
        if ($this->diceHand1->isNormalPoint() && $this->diceHand2->isNormalPoint()) {
            return $this->diceHand1->getSingePoint() - $this->diceHand2->getSingePoint();
        }

        $category1 = $this->diceHand1->getCategory();
        $category2 = $this->diceHand2->getCategory();

        return $category1->rank->value - $category2->rank->value;
    }
}
