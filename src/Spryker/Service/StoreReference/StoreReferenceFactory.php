<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\StoreReference;

use Spryker\Service\Kernel\AbstractServiceFactory;
use Spryker\Service\StoreReference\Model\StoreReferenceReader;
use Spryker\Service\StoreReference\Model\StoreReferenceReaderInterface;
use Spryker\Service\StoreReference\Dependency\Service\StoreReferenceToUtilEncodingServiceInterface;

/**
 * @method \Spryker\Service\StoreReference\StoreReferenceConfig getConfig()
 */
class StoreReferenceFactory extends AbstractServiceFactory
{
    /**
     * @return \Spryker\Service\StoreReference\Model\StoreReferenceReaderInterface
     */
    public function createStoreReferenceMap(): StoreReferenceReaderInterface
    {
        return new StoreReferenceReader(
            $this->getUtilEncodingService(),
            $this->getConfig(),
        );
    }

    /**
     * @return \Spryker\Service\StoreReference\Dependency\Service\StoreReferenceToUtilEncodingServiceInterface
     */
    public function getUtilEncodingService(): StoreReferenceToUtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(StoreReferenceDependencyProvider::SERVICE_UTIL_ENCODING);
    }
}
