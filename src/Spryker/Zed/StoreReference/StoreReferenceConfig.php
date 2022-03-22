<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\StoreReference;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class StoreReferenceConfig extends AbstractBundleConfig
{
    /**
     * @api
     *
     * @example The format of returned JSON:
     * {
     *     "DE": "dev-DE",
     *     "AT": "dev-AT",
     *     "STORE_NAME_A": "STORE_REFERENCE_A"
     * }
     *
     * @return string
     */
    public function getStoreNameReferenceMap(): string
    {
        return (string)getenv('STORE_NAME_REFERENCE_MAP');
    }
}
