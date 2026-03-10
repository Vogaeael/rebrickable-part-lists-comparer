<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Vogaeael\RebrickablePartListsComparer\Comparer;
use Vogaeael\RebrickablePartListsComparer\Types;

$type = $argv[1];
$fileA = $argv[2];
$fileB = $argv[3];
$resultFile = $argv[4];

$comparer = new Comparer();
$type = Types::from($type);
$comparer->subtractFiles($type, $fileA, $fileB, $resultFile);
