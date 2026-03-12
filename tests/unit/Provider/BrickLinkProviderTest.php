<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Provider;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Loader\BrickLinkLoader;
use Vogaeael\RebrickablePartListsComparer\Provider\BrickLinkProvider;
use Vogaeael\RebrickablePartListsComparer\Subtractor\BrickLinkSubtractor;
use Vogaeael\RebrickablePartListsComparer\Types;
use Vogaeael\RebrickablePartListsComparer\Writer\BrickLinkWriter;

final class BrickLinkProviderTest extends TestCase
{
    public function testGetLoader(): void
    {
        $provider = new BrickLinkProvider($this->createStub(CheckClass::class));

        $loaderA = $provider->getLoader();
        $this->assertInstanceOf(BrickLinkLoader::class, $loaderA);
    }

    public function testGetWriter(): void
    {
        $provider = new BrickLinkProvider($this->createStub(CheckClass::class));

        $writerA = $provider->getWriter();
        $this->assertInstanceOf(BrickLinkWriter::class, $writerA);
    }

    public function testGetSubtractor(): void
    {
        $provider = new BrickLinkProvider($this->createStub(CheckClass::class));

        $subtractorA = $provider->getSubtractor();
        $this->assertInstanceOf(BrickLinkSubtractor::class, $subtractorA);
    }

    public function testGetKey(): void
    {
        $provider = new BrickLinkProvider($this->createStub(CheckClass::class));

        $this->assertSame(Types::BrickLink, $provider->getKey());
    }
}
