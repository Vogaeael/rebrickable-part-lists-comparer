<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer\Provider;

use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Types;

class ProviderList
{
    /** @var array<string, Provider> $providers */
    private array $providers = [];

    public function __construct(CheckClass $checkClass)
    {
        $this->addProviders(
            new BrickLinkProvider($checkClass),
            new BrickStoreBSXProvider($checkClass),
            new LDCadProvider($checkClass),
            new LegoPickABrickProvider($checkClass),
            new RebrickableProvider($checkClass)
        );
    }

    public function getProvider(Types $type): Provider
    {
        return $this->providers[$type->value];
    }

    private function addProviders(...$providers): void
    {
        foreach ($providers as $provider) {
            $this->addProvider($provider);
        }
    }

    private function addProvider(Provider $provider): void
    {
        $this->providers[$provider->getKey()->value] = $provider;
    }
}
