<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer;

enum Types: string
{
    case BrickLink = 'BrickLink';
    case BrickStoreBSX = 'BrickStoreBSX';
    case LDCad = 'LDCad';
    case LegoPickABrick = 'LegoPickABrick';
    case Rebrickable = 'Rebrickable';
}
