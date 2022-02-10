<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\StoreReference\Model;

use Generated\Shared\Transfer\StoreTransfer;
use Spryker\Service\StoreReference\Dependency\Service\StoreReferenceToUtilEncodingServiceInterface;
use Spryker\Service\StoreReference\Exception\StoreReferenceNotFoundException;
use Spryker\Service\StoreReference\StoreReferenceConfig;

class StoreReferenceReader implements StoreReferenceReaderInterface
{
    /**
     * @var \Spryker\Service\StoreReference\Dependency\Service\StoreReferenceToUtilEncodingServiceInterface
     */
    protected $utilEncodingService;

    /**
     * @var \Spryker\Service\StoreReference\StoreReferenceConfig
     */
    protected $storeReferenceConfig;

    /**
     * @param \Spryker\Service\StoreReference\Dependency\Service\StoreReferenceToUtilEncodingServiceInterface $utilEncodingService
     * @param \Spryker\Service\StoreReference\StoreReferenceConfig $storeReferenceConfig
     */
    public function __construct(
        StoreReferenceToUtilEncodingServiceInterface $utilEncodingService,
        StoreReferenceConfig $storeReferenceConfig
    ) {
        $this->utilEncodingService = $utilEncodingService;
        $this->storeReferenceConfig = $storeReferenceConfig;
    }

    /**
     * @param string $storeReference
     *
     * @throws \Spryker\Service\StoreReference\Exception\StoreReferenceNotFoundException
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getStoreByStoreReference(string $storeReference): StoreTransfer
    {
        $storeReferenceMap = array_flip($this->getStoreReferenceMap());

        if (!empty($storeReferenceMap[$storeReference])) {
            return (new StoreTransfer())
                ->setName((string)$storeReferenceMap[$storeReference])
                ->setStoreReference($storeReference);
        }

        throw new StoreReferenceNotFoundException(
            sprintf('StoreReference: %s was not found', $storeReference),
        );
    }

    /**
     * @param string $storeName
     *
     * @throws \Spryker\Service\StoreReference\Exception\StoreReferenceNotFoundException
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getStoreByStoreName(string $storeName): StoreTransfer
    {
        $storeReferenceMap = $this->getStoreReferenceMap();

        if (!empty($storeReferenceMap[$storeName])) {
            return (new StoreTransfer())
                ->setName($storeName)
                ->setStoreReference($storeReferenceMap[$storeName]);
        }

        throw new StoreReferenceNotFoundException(
            sprintf('StoreReference was not found by StoreName: %s', $storeName),
        );
    }

    /**
     * @return array<string>
     */
    protected function getStoreReferenceMap(): array
    {
        if (!$this->storeReferenceConfig->getStoreNameReferenceMap()) {
            return [];
        }

        return $this->utilEncodingService->decodeJson(
            html_entity_decode($this->storeReferenceConfig->getStoreNameReferenceMap(), ENT_QUOTES),
            true,
        );
    }
}
