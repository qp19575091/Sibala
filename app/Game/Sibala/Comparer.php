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

        if ($category1->type === $category2->type && $this->handDice1->isNormalPoint()) {
            return $this->compareSinglePoint();
        }

        if ($category1->type === $category2->type) {
            return 0;
        }

        return $category1->type > $category2->type
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
