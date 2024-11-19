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

        $compareResult = $category1->type->value - $category2->type->value;

        if ($compareResult === 0 && $this->handDice1->isNormalPoint()) {
            return $this->compareSinglePoint();
        }

        return $compareResult;
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
