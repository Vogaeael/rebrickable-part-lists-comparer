<?php

namespace Vogaeael\RebrickablePartListsComparer\Loader;

interface PartLoader
{
    public function load(string $filePath): array;
}
