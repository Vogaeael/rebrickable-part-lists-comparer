<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Provider;

use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Loader\PartLoader;
use Vogaeael\RebrickablePartListsComparer\Subtractor\PartSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\PartWriter;

abstract class AbstractProvider implements Provider
{
    protected static Types $KEY;
    protected PartLoader $partLoader;
    protected PartWriter $partWriter;
    protected PartSubtractor $partSubtractor;

    public function __construct(
        protected readonly CheckClass $checkClass
    ) {
    }

    public function getLoader(): PartLoader
    {
        if (!$this->partLoader) {
            $this->createLoader();
        }

        return $this->partLoader;
    }

    abstract protected function createLoader(): void;

    public function getWriter(): PartWriter
    {
        if (!$this->partWriter) {
            $this->createWriter();
        }

        return $this->partWriter;
    }

    abstract protected function createWriter(): void;

    public function getSubtractor(): PartSubtractor
    {
        if (!$this->partSubtractor) {
            $this->createSubtractor();
        }

        return $this->partSubtractor;
    }

    abstract protected function createSubtractor(): void;

    public function getKey(): Types
    {
        return static::$KEY;
    }
}
