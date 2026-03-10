<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Provider;

use Vogaeael\RebrickablePartListsComparer\Loader\BrickStoreBSXLoader;
use Vogaeael\RebrickablePartListsComparer\Subtractor\BrickStoreBSXSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\BrickStoreBSXWriter;

class BrickStoreBSXProvider extends AbstractProvider
{
    protected static Types $KEY = Types::BrickStoreBSX;

    protected function createLoader(): void
    {
        $this->partLoader = new BrickStoreBSXLoader();
    }

    protected function createWriter(): void
    {
        $this->partWriter = new BrickStoreBSXWriter($this->checkClass);
    }

    protected function createSubtractor(): void
    {
        $this->partSubtractor = new BrickStoreBSXSubtractor($this->checkClass);
    }
}
