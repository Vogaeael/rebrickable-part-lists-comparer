<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\tests\unit\Provider;

use PHPUnit\Framework\TestCase;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Provider\BrickLinkProvider;
use Vogaeael\RebrickablePartListsComparer\Provider\BrickStoreBSXProvider;
use Vogaeael\RebrickablePartListsComparer\Provider\LDCadProvider;
use Vogaeael\RebrickablePartListsComparer\Provider\LegoPickABrickProvider;
use Vogaeael\RebrickablePartListsComparer\Provider\ProviderList;
use Vogaeael\RebrickablePartListsComparer\Provider\RebrickableProvider;

class ProviderListTest extends TestCase
{
    public function testGetProviders(): void
    {
        $providerList = new ProviderList($this->createStub(CheckClass::class));

        $this->assertInstanceOf(BrickLinkProvider::class, $providerList->getProvider(BrickLinkProvider::getKey()));
        $this->assertInstanceOf(BrickStoreBSXProvider::class, $providerList->getProvider(BrickStoreBSXProvider::getKey()));
        $this->assertInstanceOf(LDCadProvider::class, $providerList->getProvider(LDCadProvider::getKey()));
        $this->assertInstanceOf(LegoPickABrickProvider::class, $providerList->getProvider(LegoPickABrickProvider::getKey()));
        $this->assertInstanceOf(RebrickableProvider::class, $providerList->getProvider(RebrickableProvider::getKey()));
    }
}
