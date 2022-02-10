<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\StoreReference;

use Spryker\Service\Kernel\AbstractBundleConfig;

class StoreReferenceConfig extends AbstractBundleConfig
{
    /**
     * @api
     *
     * @return string
     */
    public function getStoreNameReferenceMap(): string
    {
        return (string)getenv('STORE_NAME_REFERENCE_MAP');
    }
}
