<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\StoreReference\Business\Expander;

use Generated\Shared\Transfer\AccessTokenRequestOptionsTransfer;
use Generated\Shared\Transfer\AccessTokenRequestTransfer;
use Spryker\Zed\StoreReference\Business\StoreReferenceFacadeInterface;
use Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface;

class StoreReferenceAccessTokenRequestExpander implements StoreReferenceAccessTokenRequestExpanderInterface
{
    /**
     * @var \Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface
     */
    protected $storeFacade;

    /**
     * @var \Spryker\Zed\StoreReference\Business\StoreReferenceFacadeInterface
     */
    protected $storeReferenceFacade;

    /**
     * @param \Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface $storeFacade
     * @param \Spryker\Zed\StoreReference\Business\StoreReferenceFacadeInterface $storeReferenceFacade
     */
    public function __construct(StoreReferenceToStoreInterface $storeFacade, StoreReferenceFacadeInterface $storeReferenceFacade)
    {
        $this->storeFacade = $storeFacade;
        $this->storeReferenceFacade = $storeReferenceFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\AccessTokenRequestTransfer $accessTokenRequestTransfer
     *
     * @return \Generated\Shared\Transfer\AccessTokenRequestTransfer
     */
    public function expand(AccessTokenRequestTransfer $accessTokenRequestTransfer): AccessTokenRequestTransfer
    {
        $currentStoreTransfer = $this->storeFacade->getCurrentStore();
        $storeTransfer = $this->storeReferenceFacade->getStoreByStoreName($currentStoreTransfer->getName());

        $accessTokenRequestOptionsTransfer = $accessTokenRequestTransfer->getAccessTokenRequestOptions();
        if ($accessTokenRequestOptionsTransfer === null) {
            $accessTokenRequestOptionsTransfer = new AccessTokenRequestOptionsTransfer();
        }

        $accessTokenRequestOptionsTransfer->setStoreReference($storeTransfer->getStoreReference());
        $accessTokenRequestTransfer->setAccessTokenRequestOptions($accessTokenRequestOptionsTransfer);

        return $accessTokenRequestTransfer;
    }
}
