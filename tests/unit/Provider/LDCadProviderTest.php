<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Provider;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Loader\LDCadLoader;
use Vogaeael\RebrickablePartListsComparer\Provider\LDCadProvider;
use Vogaeael\RebrickablePartListsComparer\Subtractor\LDCadSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\LDCadWriter;

class LDCadProviderTest extends TestCase
{
    public function testGetLoader(): void
    {
        $provider = new LDCadProvider($this->createStub(CheckClass::class));

        $loaderA = $provider->getLoader();
        $this->assertInstanceOf(LDCadLoader::class, $loaderA);
    }

    public function testGetWriter(): void
    {
        $provider = new LDCadProvider($this->createStub(CheckClass::class));

        $writerA = $provider->getWriter();
        $this->assertInstanceOf(LDCadWriter::class, $writerA);
    }

    public function testGetSubtractor(): void
    {
        $provider = new LDCadProvider($this->createStub(CheckClass::class));

        $subtractorA = $provider->getSubtractor();
        $this->assertInstanceOf(LDCadSubtractor::class, $subtractorA);
    }

    public function testGetKey(): void
    {
        $provider = new LDCadProvider($this->createStub(CheckClass::class));

        $this->assertSame(Types::LDCad, $provider->getKey());
    }
}
