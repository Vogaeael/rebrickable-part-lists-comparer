<?php declare(strict_types=1);

namespace Vogaeael\tests\Provider;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Loader\RebrickableLoader;
use Vogaeael\RebrickablePartListsComparer\Provider\RebrickableProvider;
use Vogaeael\RebrickablePartListsComparer\Subtractor\RebrickableSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\RebrickableWriter;

class RebrickableProviderTest extends TestCase
{
    public function testGetLoader(): void
    {
        $provider = new RebrickableProvider($this->createStub(CheckClass::class));

        $loaderA = $provider->getLoader();
        $this->assertInstanceOf(RebrickableLoader::class, $loaderA);
    }

    public function testGetWriter(): void
    {
        $provider = new RebrickableProvider($this->createStub(CheckClass::class));

        $writerA = $provider->getWriter();
        $this->assertInstanceOf(RebrickableWriter::class, $writerA);
    }

    public function testGetSubtractor(): void
    {
        $provider = new RebrickableProvider($this->createStub(CheckClass::class));

        $subtractorA = $provider->getSubtractor();
        $this->assertInstanceOf(RebrickableSubtractor::class, $subtractorA);
    }

    public function testGetKey(): void
    {
        $provider = new RebrickableProvider($this->createStub(CheckClass::class));

        $this->assertSame(Types::Rebrickable, $provider->getKey());
    }
}
