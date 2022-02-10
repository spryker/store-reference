<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\StoreReference;

interface StoreReferenceServiceInterface
{
    /**
     * @param string $storeReference
     *
     * @return \Generated\Shared\Transfer\StoreTransfer|null
     */
    public function findStoreByStoreReference(string $storeReference): ?StoreTransfer;

    /**
     * @param string $storeName
     *
     * @return \Generated\Shared\Transfer\StoreTransfer|null
     */
    public function findStoreByStoreName(string $storeName): ?StoreTransfer;
}
