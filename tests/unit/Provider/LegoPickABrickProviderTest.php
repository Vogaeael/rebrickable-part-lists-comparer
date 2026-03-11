<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Provider;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Loader\LegoPickABrickLoader;
use Vogaeael\RebrickablePartListsComparer\Provider\LegoPickABrickProvider;
use Vogaeael\RebrickablePartListsComparer\Subtractor\LegoPickABrickSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\LegoPickABrickWriter;

class LegoPickABrickProviderTest extends TestCase
{
    public function testGetLoader(): void
    {
        $provider = new LegoPickABrickProvider($this->createStub(CheckClass::class));

        $loaderA = $provider->getLoader();
        $this->assertInstanceOf(LegoPickABrickLoader::class, $loaderA);
    }

    public function testGetWriter(): void
    {
        $provider = new LegoPickABrickProvider($this->createStub(CheckClass::class));

        $writerA = $provider->getWriter();
        $this->assertInstanceOf(LegoPickABrickWriter::class, $writerA);
    }

    public function testGetSubtractor(): void
    {
        $provider = new LegoPickABrickProvider($this->createStub(CheckClass::class));

        $subtractorA = $provider->getSubtractor();
        $this->assertInstanceOf(LegoPickABrickSubtractor::class, $subtractorA);
    }

    public function testGetKey(): void
    {
        $provider = new LegoPickABrickProvider($this->createStub(CheckClass::class));

        $this->assertSame(Types::LegoPickABrick, $provider->getKey());
    }
}
