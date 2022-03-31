<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\StoreReference\Helper;

use Codeception\Module;

class StoreReferenceHelper extends Module
{
    /**
     * @var string
     */
    protected const STORE_NAME_REFERENCE_MAP_ENV_NAME = 'STORE_NAME_REFERENCE_MAP';

    /**
     * @var string
     */
    protected $storeNameReferenceMapDefault = '';

    /**
     * @var bool
     */
    protected $isStoreNameReferenceMapMustBeRestored = false;

    /**
     * @param array<string, string> $storeReferenceData
     *
     * @return void
     */
    public function setStoreReferenceData(array $storeReferenceData): void
    {
        if (!$this->isStoreNameReferenceMapMustBeRestored) {
            $this->storeNameReferenceMapDefault = getenv(static::STORE_NAME_REFERENCE_MAP_ENV_NAME);
            $this->isStoreNameReferenceMapMustBeRestored = true;
        }

        putenv(sprintf('%s=%s',static::STORE_NAME_REFERENCE_MAP_ENV_NAME,  json_encode($storeReferenceData)));
    }

    /**
     * @return void
     */
    public function _afterSuite(): void
    {
        if (!$this->isStoreNameReferenceMapMustBeRestored) {
            return;
        }

        putenv(sprintf('%s=%s', static::STORE_NAME_REFERENCE_MAP_ENV_NAME, $this->storeNameReferenceMapDefault));
        $this->storeNameReferenceMapDefault = '';
        $this->isStoreNameReferenceMapMustBeRestored = false;
    }
}
