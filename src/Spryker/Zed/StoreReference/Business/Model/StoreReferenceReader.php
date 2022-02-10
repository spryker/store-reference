<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\StoreReference\Business\Model;

use Generated\Shared\Transfer\StoreTransfer;
use Spryker\Zed\StoreReference\Business\Exception\StoreReferenceNotFoundException;
use Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface;
use Spryker\Zed\StoreReference\Dependency\Service\StoreReferenceToUtilEncodingServiceInterface;
use Spryker\Zed\StoreReference\StoreReferenceConfig;

class StoreReferenceReader implements StoreReferenceReaderInterface
{
    /**
     * @var \Spryker\Zed\StoreReference\Dependency\Service\StoreReferenceToUtilEncodingServiceInterface
     */
    protected $utilEncodingService;

    /**
     * @var \Spryker\Zed\StoreReference\StoreReferenceConfig
     */
    protected $storeReferenceConfig;

    /**
     * @var \Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface
     */
    protected $storeFacade;

    /**
     * @param \Spryker\Zed\StoreReference\Dependency\Service\StoreReferenceToUtilEncodingServiceInterface $utilEncodingService
     * @param \Spryker\Zed\StoreReference\StoreReferenceConfig $storeReferenceConfig
     * @param \Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface $storeFacade
     */
    public function __construct(
        StoreReferenceToUtilEncodingServiceInterface $utilEncodingService,
        StoreReferenceConfig $storeReferenceConfig,
        StoreReferenceToStoreInterface $storeFacade
    ) {
        $this->utilEncodingService = $utilEncodingService;
        $this->storeReferenceConfig = $storeReferenceConfig;
        $this->storeFacade = $storeFacade;
    }

    /**
     * @param string $storeReference
     *
     * @throws \Spryker\Zed\StoreReference\Business\Exception\StoreReferenceNotFoundException
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getStoreByStoreReference(string $storeReference): StoreTransfer
    {
        $storeReferenceMap = array_flip($this->getStoreReferenceMap());

        if (!empty($storeReferenceMap[$storeReference])) {
            $storeTransfer = $this->storeFacade->getStoreByName($storeReferenceMap[$storeReference]);
            $storeTransfer->setStoreReference($storeReference);

            return $storeTransfer;
        }

        throw new StoreReferenceNotFoundException(
            sprintf('StoreReference: %s was not found', $storeReference),
        );
    }

    /**
     * @param string $storeName
     *
     * @throws \Spryker\Zed\StoreReference\Business\Exception\StoreReferenceNotFoundException
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getStoreByStoreName(string $storeName): StoreTransfer
    {
        $storeReferenceMap = $this->getStoreReferenceMap();

        if (!empty($storeReferenceMap[$storeName])) {
            $storeTransfer = $this->storeFacade->getStoreByName($storeName);
            $storeTransfer->setStoreReference($storeReferenceMap[$storeName]);

            return $storeTransfer;
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
