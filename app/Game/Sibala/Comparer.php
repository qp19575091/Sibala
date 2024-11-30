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
        $category1 = $this->handDice1->getCategory();
        $category2 = $this->handDice2->getCategory();

        $compareResult = $category1->rank->value - $category2->rank->value;

        if ($compareResult === 0 && $this->handDice1->isNormalPoint()) {
            return $this->handDice1->getSingePoint() - $this->handDice2->getSingePoint();
        }

        return $compareResult;
    }
}
