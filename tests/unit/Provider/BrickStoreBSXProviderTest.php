<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Provider;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Loader\BrickStoreBSXLoader;
use Vogaeael\RebrickablePartListsComparer\Provider\BrickStoreBSXProvider;
use Vogaeael\RebrickablePartListsComparer\Subtractor\BrickStoreBSXSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\BrickStoreBSXWriter;

final class BrickStoreBSXProviderTest extends TestCase
{
    public function testGetLoader(): void
    {
        $provider = new BrickStoreBSXProvider($this->createStub(CheckClass::class));

        $loaderA = $provider->getLoader();
        $this->assertInstanceOf(BrickStoreBSXLoader::class, $loaderA);
    }

    public function testGetWriter(): void
    {
        $provider = new BrickStoreBSXProvider($this->createStub(CheckClass::class));

        $writerA = $provider->getWriter();
        $this->assertInstanceOf(BrickStoreBSXWriter::class, $writerA);
    }

    public function testGetSubtractor(): void
    {
        $provider = new BrickStoreBSXProvider($this->createStub(CheckClass::class));

        $subtractorA = $provider->getSubtractor();
        $this->assertInstanceOf(BrickStoreBSXSubtractor::class, $subtractorA);
    }

    public function testGetKey(): void
    {
        $provider = new BrickStoreBSXProvider($this->createStub(CheckClass::class));

        $this->assertSame(Types::BrickStoreBSX, $provider->getKey());
    }
}
