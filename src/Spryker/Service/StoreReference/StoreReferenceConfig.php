<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\StoreReference;

use Spryker\Service\Kernel\AbstractBundleConfig;
use Spryker\Shared\Flysystem\FlysystemConstants;

class StoreReferenceConfig extends AbstractBundleConfig
{
    /**
     * @api
     *
     * @return array<string, mixed>
     */
    public function getStoreNameReferenceMap(): string
    {
        return getenv('STORE_NAME_REFERENCE_MAP');
    }
}
