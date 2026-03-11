<?php declare(strict_types=1);

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

    public static function getKey(): Types;
}
