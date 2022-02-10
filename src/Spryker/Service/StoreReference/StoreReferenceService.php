<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\StoreReference;

use Generated\Shared\Transfer\StoreTransfer;
use Spryker\Service\Kernel\AbstractService;

/**
 * @method \Spryker\Service\StoreReference\StoreReferenceFactory getFactory()
 */
class StoreReferenceService extends AbstractService implements StoreReferenceServiceInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $storeReference
     *
     * @throws \Spryker\Service\StoreReference\Exception\StoreReferenceNotFoundException
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getStoreByStoreReference(string $storeReference): StoreTransfer
    {
        return $this->getFactory()->createStoreReferenceMap()->getStoreByStoreReference($storeReference);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $storeName
     *
     * @throws \Spryker\Service\StoreReference\Exception\StoreReferenceNotFoundException
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getStoreByStoreName(string $storeName): StoreTransfer
    {
        return $this->getFactory()->createStoreReferenceMap()->getStoreByStoreName($storeName);
    }
}
