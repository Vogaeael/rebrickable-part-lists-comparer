<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Vogaeael\RebrickablePartListsComparer\Comparer;
use Vogaeael\RebrickablePartListsComparer\Types;

$typeString = $argv[1];
$fileMinuend = $argv[2];
$fileSubtrahend = $argv[3];
$resultFile = $argv[4];

$comparer = new Comparer();
$type = Types::from($typeString);
$comparer->subtractFiles($type, $fileMinuend, $fileSubtrahend, $resultFile);
