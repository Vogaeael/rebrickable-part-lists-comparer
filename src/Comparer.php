<?php declare(strict_types=1);

namespace Vogaeael\RebrickablePartListsComparer;

use Exception;
use Vogaeael\RebrickablePartListsComparer\Helper\CheckClass;
use Vogaeael\RebrickablePartListsComparer\Model\Part;
use Vogaeael\RebrickablePartListsComparer\Provider\ProviderList;
use Vogaeael\RebrickablePartListsComparer\Subtractor\PartSubtractor;

class Comparer
{
    private CheckClass $checkClass;
    private ProviderList $providerList;

    public function __construct()
    {
        $this->checkClass = new CheckClass();
        $this->providerList = new ProviderList($this->checkClass);
    }

    /**
     * @throws Exception
     */
    public function subtractFiles(Types $listType, string $filePathA, string $filePathB, string $filePathResult): void
    {
        $provider = $this->providerList->getProvider($listType);
        $loader = $provider->getLoader();

        $partsA = $loader->load($filePathA);
        $partsB = $loader->load($filePathB);

        $partsResult = $this->subtractList($listType, $partsA, $partsB);

        $writer = $provider->getWriter();
        $writer->writePart($partsResult, $filePathResult);
    }

    /**
     * @param Types $listType
     * @param Part[] $partsA
     * @param Part[] $partsB
     *
     * @return Part[]
     */
    public function subtractList(Types $listType, array $partsA, array $partsB): array
    {
        $provider = $this->providerList->getProvider($listType);

        return $this->compareList($provider->getSubtractor(), $partsA, $partsB);
    }

    /**
     * @param Part[] $partsA
     * @param Part[] $partsB
     *
     * @return Part[]
     */
    private function compareList(PartSubtractor $partSubtractor, array $partsA, array $partsB): array
    {
        $resultParts = [];

        foreach ($partsA as $partA) {
            $partB = $partsB[$partA->generateKey()] ?? null;

            $substraction = $partSubtractor->subtract($partA, $partB);

            $resultParts[$substraction->generateKey()] = $substraction;
        }

        return $resultParts;
    }
}
