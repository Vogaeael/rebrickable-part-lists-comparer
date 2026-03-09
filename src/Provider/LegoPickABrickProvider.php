<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Provider;

use Vogaeael\RebrickablePartListsComparer\Loader\LegoPickABrickLoader;
use Vogaeael\RebrickablePartListsComparer\Subtractor\BrickLinkSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\LegoPickABrickWriter;

class LegoPickABrickProvider extends AbstractProvider
{
    protected static Types $KEY = Types::LegoPickABrick;

    protected function createLoader(): void
    {
        $this->partLoader = new LegoPickABrickLoader();
    }

    protected function createWriter(): void
    {
        $this->partWriter = new LegoPickABrickWriter($this->checkClass);
    }

    protected function createSubtractor(): void
    {
        $this->partSubtractor = new BrickLinkSubtractor($this->checkClass);
    }
}
