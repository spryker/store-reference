<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\StoreReference\Communication;

use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\StoreReference\Communication\Expander\StoreReferenceAccessTokenRequestExpander;
use Spryker\Zed\StoreReference\Communication\Expander\StoreReferenceAccessTokenRequestExpanderInterface;
use Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface;
use Spryker\Zed\StoreReference\StoreReferenceDependencyProvider;

/**
 * @method \Spryker\Zed\StoreReference\Business\StoreReferenceFacadeInterface getFacade()
 * @method \Spryker\Zed\StoreReference\StoreReferenceConfig getConfig()
 */
class StoreReferenceCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Spryker\Zed\StoreReference\Communication\Expander\StoreReferenceAccessTokenRequestExpanderInterface
     */
    public function createStoreReferenceAccessTokenRequestExpander(): StoreReferenceAccessTokenRequestExpanderInterface
    {
        return new StoreReferenceAccessTokenRequestExpander(
            $this->getStoreFacade(),
            $this->getFacade(),
        );
    }

    /**
     * @return \Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface
     */
    protected function getStoreFacade(): StoreReferenceToStoreInterface
    {
        return $this->getProvidedDependency(StoreReferenceDependencyProvider::FACADE_STORE);
    }
}
