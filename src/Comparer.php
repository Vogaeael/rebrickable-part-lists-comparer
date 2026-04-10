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
    public function subtractFiles(Types $listType, string $filePathMinuend, string $filePathSubtrahend, string $filePathResult): void
    {
        $provider = $this->providerList->getProvider($listType);
        $loader = $provider->getLoader();

        $partsMinuend = $loader->load($filePathMinuend);
        $partsSubtrahend = $loader->load($filePathSubtrahend);

        $partsResult = $this->subtractList($listType, $partsMinuend, $partsSubtrahend);

        $writer = $provider->getWriter();
        $writer->writePart($partsResult, $filePathResult);
    }

    /**
     * @param Types $listType
     * @param Part[] $partsMinuend
     * @param Part[] $partsSubtrahend
     *
     * @return Part[]
     */
    public function subtractList(Types $listType, array $partsMinuend, array $partsSubtrahend): array
    {
        $provider = $this->providerList->getProvider($listType);

        return $this->compareList($provider->getSubtractor(), $partsMinuend, $partsSubtrahend);
    }

    /**
     * @param Part[] $partsMinuend
     * @param Part[] $partsSubtrahend
     *
     * @return Part[]
     */
    private function compareList(PartSubtractor $partSubtractor, array $partsMinuend, array $partsSubtrahend): array
    {
        $resultParts = [];

        foreach ($partsMinuend as $partMinuend) {
            $partSubtrahend = $partsSubtrahend[$partMinuend->generateKey()] ?? null;

            $substraction = $partSubtractor->subtract($partMinuend, $partSubtrahend);

            $resultParts[$substraction->generateKey()] = $substraction;
        }

        return $resultParts;
    }
}
