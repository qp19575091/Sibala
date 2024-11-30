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
        $category1 = $this->diceHand1->getCategory();
        $category2 = $this->diceHand2->getCategory();

        $compareResult = $category1->rank->value - $category2->rank->value;

        if ($compareResult === 0 && $this->diceHand1->isNormalPoint()) {
            return $this->diceHand1->getSingePoint() - $this->diceHand2->getSingePoint();
        }

        return $compareResult;
    }
}
