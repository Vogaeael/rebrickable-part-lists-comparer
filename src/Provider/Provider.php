<?php

namespace Vogaeael\RebrickablePartListsComparer\Provider;

use Vogaeael\RebrickablePartListsComparer\Loader\PartLoader;
use Vogaeael\RebrickablePartListsComparer\Subtractor\PartSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\PartWriter;

interface Provider
{
    public function getLoader(): PartLoader;

    public function getWriter(): PartWriter;

    public function getSubtractor(): PartSubtractor;

    public function getKey(): Types;
}