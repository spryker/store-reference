<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\StoreReference\Business;

use Spryker\Zed\AssetExternal\AssetExternalDependencyProvider;
use Spryker\Zed\AssetExternal\Dependency\Facade\AssetExternalToStoreBridgeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\StoreReference\Business\Model\StoreReferenceReader;
use Spryker\Zed\StoreReference\Business\Model\StoreReferenceReaderInterface;
use Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface;
use Spryker\Zed\StoreReference\Dependency\Service\StoreReferenceToUtilEncodingServiceInterface;
use Spryker\Zed\StoreReference\StoreReferenceDependencyProvider;

/**
 * @method \Spryker\Zed\StoreReference\StoreReferenceConfig getConfig()
 */
class StoreReferenceBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Spryker\Zed\StoreReference\Business\Model\StoreReferenceReaderInterface
     */
    public function createStoreReferenceMap(): StoreReferenceReaderInterface
    {
        return new StoreReferenceReader(
            $this->getUtilEncodingService(),
            $this->getConfig(),
            $this->getStoreFacade(),
        );
    }

    /**
     * @return \Spryker\Zed\StoreReference\Dependency\Service\StoreReferenceToUtilEncodingServiceInterface
     */
    public function getUtilEncodingService(): StoreReferenceToUtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(StoreReferenceDependencyProvider::SERVICE_UTIL_ENCODING);
    }

    /**
     * @return \Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface
     */
    public function getStoreFacade(): StoreReferenceToStoreInterface
    {
        return $this->getProvidedDependency(StoreReferenceDependencyProvider::FACADE_STORE);
    }
}
