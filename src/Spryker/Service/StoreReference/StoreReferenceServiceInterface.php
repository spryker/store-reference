<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\StoreReference;

use Generated\Shared\Transfer\StoreTransfer;

interface StoreReferenceServiceInterface
{
    /**
     * Specification:
     * - Returns StoreTransfer by $storeReference.
     *
     * @api
     *
     * @param string $storeReference
     *
     * @throws \Spryker\Service\StoreReference\Exception\StoreReferenceNotFoundException
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getStoreByStoreReference(string $storeReference): StoreTransfer;

    /**
     * Specification:
     * - Returns StoreTransfer by $storeName.
     *
     * @api
     *
     * @param string $storeName
     *
     * @throws \Spryker\Service\StoreReference\Exception\StoreReferenceNotFoundException
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getStoreByStoreName(string $storeName): StoreTransfer;
}
