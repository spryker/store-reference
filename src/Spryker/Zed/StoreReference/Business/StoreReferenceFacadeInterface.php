<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\StoreReference\Business;

use Generated\Shared\Transfer\StoreTransfer;

interface StoreReferenceFacadeInterface
{
    /**
     * Specification:
     * - Returns StoreTransfer by $storeReference.
     * - Decodes STORE_NAME_REFERENCE_MAP and uses the Store module to get the store.
     * - The StoreTransfer is extended before being returned.
     *
     * @api
     *
     * @param string $storeReference
     *
     * @throws \Spryker\Zed\StoreReference\Business\Exception\StoreReferenceNotFoundException
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getStoreByStoreReference(string $storeReference): StoreTransfer;

    /**
     * Specification:
     * - Returns StoreTransfer by $storeName.
     * - Decodes STORE_NAME_REFERENCE_MAP and uses the Store module to get the store.
     * - The StoreTransfer is extended before being returned.
     *
     * @api
     *
     * @param string $storeName
     *
     * @throws \Spryker\Zed\StoreReference\Business\Exception\StoreReferenceNotFoundException
     *
     * @return \Generated\Shared\Transfer\StoreTransfer
     */
    public function getStoreByStoreName(string $storeName): StoreTransfer;
}
