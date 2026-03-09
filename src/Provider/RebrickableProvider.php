<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Provider;

use Vogaeael\RebrickablePartListsComparer\Loader\RebrickableLoader;
use Vogaeael\RebrickablePartListsComparer\Subtractor\BrickLinkSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\RebrickableWriter;

class RebrickableProvider extends AbstractProvider
{
    protected static Types $KEY = Types::Rebrickable;

    protected function createLoader(): void
    {
        $this->partLoader = new RebrickableLoader();
    }

    protected function createWriter(): void
    {
        $this->partWriter = new RebrickableWriter($this->checkClass);
    }

    protected function createSubtractor(): void
    {
        $this->partSubtractor = new BrickLinkSubtractor($this->checkClass);
    }
}
