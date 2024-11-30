<?php

namespace App\Enums\Sibala;

enum CateGoryRank: int
{
    case ThreeOfAKindOfOne = 5;
    case StrongStraight = 2;
    case WeakStraight = 0;
    case NoPoint = -1;
    case NormalPoint = 1;
    case OtherThreeOfAKind = 3;
}
