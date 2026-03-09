<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Provider;

use Vogaeael\RebrickablePartListsComparer\Loader\BrickLinkLoader;
use Vogaeael\RebrickablePartListsComparer\Subtractor\BrickLinkSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\BrickLinkWriter;

class BrickLinkProvider extends AbstractProvider
{
    protected static Types $KEY = Types::BrickLink;

    protected function createLoader(): void
    {
        $this->partLoader = new BrickLinkLoader();
    }

    protected function createWriter(): void
    {
        $this->partWriter = new BrickLinkWriter($this->checkClass);
    }

    protected function createSubtractor(): void
    {
        $this->partSubtractor = new BrickLinkSubtractor($this->checkClass);
    }
}
