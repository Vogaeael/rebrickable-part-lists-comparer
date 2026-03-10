<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Provider;

use Vogaeael\RebrickablePartListsComparer\Loader\LDCadLoader;
use Vogaeael\RebrickablePartListsComparer\Subtractor\BrickLinkSubtractor;
use Vogaeael\RebrickablePartListsComparer\Subtractor\LDCadSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\LDCadWriter;

class LDCadProvider extends AbstractProvider
{
    protected static Types $KEY = Types::LDCad;

    protected function createLoader(): void
    {
        $this->partLoader = new LDCadLoader();
    }

    protected function createWriter(): void
    {
        $this->partWriter = new LDCadWriter($this->checkClass);
    }

    protected function createSubtractor(): void
    {
        $this->partSubtractor = new LDCadSubtractor($this->checkClass);
    }
}
